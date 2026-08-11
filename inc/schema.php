<?php
/**
 * JSON-LD schema markup.
 *
 * Skips output when a major SEO plugin is active to avoid duplicate structured data.
 *
 * @package TestRo
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

/**
 * Print JSON-LD script.
 *
 * @param array $data Schema data.
 */
function testro_print_json_ld( $data ) {
	if ( empty( $data ) ) {
		return;
	}
	echo '<script type="application/ld+json">' . wp_json_encode( $data, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE ) . '</script>' . "\n";
}

/**
 * Organization schema.
 *
 * @return array
 */
function testro_schema_organization() {
	$email    = testro_get_option( 'email', 'support@thetestro.com' );
	$linkedin = testro_get_option( 'linkedin', 'https://www.linkedin.com/company/thetestro/' );
	$youtube  = testro_get_option( 'youtube', 'https://www.youtube.com/@thetestro' );
	$phone    = testro_get_option( 'phone', '' );

	$org = array(
		'@context'    => 'https://schema.org',
		'@type'       => 'Organization',
		'@id'         => trailingslashit( home_url( '/' ) ) . '#organization',
		'name'        => 'theTestRo',
		'url'         => trailingslashit( home_url( '/' ) ),
		'logo'        => array(
			'@type'  => 'ImageObject',
			'url'    => function_exists( 'testro_asset_webp' ) ? testro_asset_webp( 'images/testrologo.png' ) : ( TESTRO_URI . '/assets/images/testrologo.png' ),
			'width'  => 315,
			'height' => 315,
		),
		'image'       => function_exists( 'testro_asset_webp' ) ? testro_asset_webp( 'images/testrologo.png' ) : ( TESTRO_URI . '/assets/images/testrologo.png' ),
		'email'       => $email,
		'sameAs'      => array_values( array_filter( array( $linkedin, $youtube ) ) ),
		'description' => 'Intelligence-powered no-code web automation platform for functional and API testing.',
		'contactPoint' => array(
			'@type'             => 'ContactPoint',
			'contactType'       => 'customer support',
			'email'             => $email,
			'url'               => trailingslashit( function_exists( 'testro_get_page_url' ) ? testro_get_page_url( 'contact-us' ) : home_url( '/contact-us/' ) ),
			'availableLanguage' => array( 'English' ),
		),
	);

	if ( $phone ) {
		$org['contactPoint']['telephone'] = $phone;
	}

	return $org;
}

/**
 * WebSite schema with optional SearchAction.
 *
 * @return array
 */
function testro_schema_website() {
	return array(
		'@context'        => 'https://schema.org',
		'@type'           => 'WebSite',
		'@id'             => trailingslashit( home_url( '/' ) ) . '#website',
		'url'             => trailingslashit( home_url( '/' ) ),
		'name'            => 'theTestRo',
		'description'     => 'Intelligence-powered no-code web automation platform for functional and API testing.',
		'publisher'       => array( '@id' => trailingslashit( home_url( '/' ) ) . '#organization' ),
		'inLanguage'      => 'en-US',
		'potentialAction' => array(
			'@type'       => 'SearchAction',
			'target'      => array(
				'@type'       => 'EntryPoint',
				'urlTemplate' => home_url( '/?s={search_term_string}' ),
			),
			'query-input' => 'required name=search_term_string',
		),
	);
}

/**
 * WebPage schema for the current document.
 *
 * @return array|null
 */
function testro_schema_webpage() {
	if ( is_search() || is_404() || testro_should_noindex() ) {
		return null;
	}

	$canonical = testro_get_canonical_url();
	$type      = array( 'WebPage' );

	if ( is_front_page() ) {
		$type = array( 'WebPage', 'CollectionPage' );
	} elseif ( is_page( 'terms-conditions' ) || is_page( 'privacy-notice' ) ) {
		$type = 'WebPage';
	} elseif ( is_home() ) {
		$type = array( 'WebPage', 'CollectionPage' );
	}

	$data = array(
		'@context'    => 'https://schema.org',
		'@type'       => $type,
		'@id'         => $canonical . '#webpage',
		'url'         => $canonical,
		'name'        => wp_get_document_title(),
		'description' => testro_get_meta_description(),
		'isPartOf'    => array( '@id' => trailingslashit( home_url( '/' ) ) . '#website' ),
		'about'       => array( '@id' => trailingslashit( home_url( '/' ) ) . '#organization' ),
		'inLanguage'  => 'en-US',
	);

	if ( is_singular() ) {
		$data['datePublished'] = get_the_date( DATE_W3C );
		$data['dateModified']  = get_the_modified_date( DATE_W3C );
	}

	return $data;
}

/**
 * SoftwareApplication schema (SaaS product) — front page.
 *
 * Uses AggregateOffer (price range) so individual plan Offers live on Product
 * schema without duplicating dense Offer lists.
 *
 * @return array|null
 */
function testro_schema_software_application() {
	if ( ! is_front_page() ) {
		return null;
	}

	$low  = null;
	$high = null;
	$count = 0;
	if ( function_exists( 'testro_get_pricing_plans' ) ) {
		foreach ( testro_get_pricing_plans() as $plan ) {
			if ( ! isset( $plan['price_monthly'] ) || ! is_numeric( $plan['price_monthly'] ) ) {
				continue;
			}
			$price = (float) $plan['price_monthly'];
			$low   = null === $low ? $price : min( $low, $price );
			$high  = null === $high ? $price : max( $high, $price );
			$count++;
		}
	}

	$offers = array(
		'@type'         => 'AggregateOffer',
		'priceCurrency' => 'USD',
		'availability'  => 'https://schema.org/InStock',
		'url'           => trailingslashit( function_exists( 'testro_get_page_url' ) ? testro_get_page_url( 'pricing' ) : home_url( '/pricing/' ) ),
		'offerCount'    => max( 1, $count ),
	);
	if ( null !== $low ) {
		$offers['lowPrice'] = (string) $low;
	}
	if ( null !== $high ) {
		$offers['highPrice'] = (string) $high;
	}
	if ( null === $low ) {
		$offers['lowPrice']  = '0';
		$offers['highPrice'] = '0';
		$offers['description'] = 'Free trial available — contact for enterprise pricing';
	}

	return array(
		'@context'               => 'https://schema.org',
		'@type'                  => 'SoftwareApplication',
		'@id'                    => trailingslashit( home_url( '/' ) ) . '#software',
		'name'                   => 'theTestRo',
		'applicationCategory'    => 'BusinessApplication',
		'applicationSubCategory' => 'Test Automation',
		'operatingSystem'        => 'Web',
		'url'                    => trailingslashit( home_url( '/' ) ),
		'image'                  => function_exists( 'testro_asset_webp' ) ? testro_asset_webp( 'images/testrologo.png' ) : ( TESTRO_URI . '/assets/images/testrologo.png' ),
		'description'            => 'Intelligence-powered no-code web automation platform with self-healing locators, NLP-based test steps, and intelligent scheduling for functional and API testing.',
		'offers'                 => $offers,
		'publisher'              => array( '@id' => trailingslashit( home_url( '/' ) ) . '#organization' ),
		'featureList'            => array(
			'No-code test recording',
			'Self-healing locators',
			'NLP-based test steps',
			'Functional and API automation',
			'Intelligent scheduling',
		),
		'aggregateRating'        => testro_schema_aggregate_rating_data(),
	);
}

/**
 * ContactPage schema when viewing the homepage contact destination.
 * Emitted as a WebPage subtype for the contact section URL.
 *
 * @return array|null
 */
function testro_schema_contact_page() {
	if ( ! is_front_page() && ! is_page( 'contact-us' ) ) {
		return null;
	}

	$email = testro_get_option( 'email', 'support@thetestro.com' );
	$phone = testro_get_option( 'phone', '' );

	$contact = array(
		'@context'    => 'https://schema.org',
		'@type'       => 'ContactPage',
		'@id'         => trailingslashit( function_exists( 'testro_get_page_url' ) ? testro_get_page_url( 'contact-us' ) : home_url( '/contact-us/' ) ),
		'url'         => trailingslashit( function_exists( 'testro_get_page_url' ) ? testro_get_page_url( 'contact-us' ) : home_url( '/contact-us/' ) ),
		'name'        => 'Contact theTestRo',
		'description' => 'Talk to theTestRo about Intelligence-powered no-code test automation. Book a demo or send a message.',
		'isPartOf'    => array( '@id' => trailingslashit( home_url( '/' ) ) . '#website' ),
		'mainEntity'  => array(
			'@type'       => 'Organization',
			'@id'         => trailingslashit( home_url( '/' ) ) . '#organization',
			'name'        => 'theTestRo',
			'email'       => $email,
			'contactPoint' => array(
				'@type'       => 'ContactPoint',
				'contactType' => 'sales',
				'email'       => $email,
				'url'         => trailingslashit( function_exists( 'testro_get_page_url' ) ? testro_get_page_url( 'contact-us' ) : home_url( '/contact-us/' ) ),
			),
		),
	);

	if ( $phone ) {
		$contact['mainEntity']['contactPoint']['telephone'] = $phone;
	}

	return $contact;
}

/**
 * BreadcrumbList for inner pages.
 *
 * @return array|null
 */
function testro_schema_breadcrumbs() {
	if ( is_front_page() ) {
		return null;
	}

	$items    = array();
	$position = 1;

	$items[] = array(
		'@type'    => 'ListItem',
		'position' => $position++,
		'name'     => 'Home',
		'item'     => trailingslashit( home_url( '/' ) ),
	);

	if ( is_singular( 'post' ) ) {
		$blog_id = (int) get_option( 'page_for_posts' );
		if ( $blog_id ) {
			$items[] = array(
				'@type'    => 'ListItem',
				'position' => $position++,
				'name'     => get_the_title( $blog_id ),
				'item'     => trailingslashit( get_permalink( $blog_id ) ),
			);
		}
		$items[] = array(
			'@type'    => 'ListItem',
			'position' => $position++,
			'name'     => get_the_title(),
			'item'     => trailingslashit( get_permalink() ),
		);
	} elseif ( is_page() ) {
		$ancestors = array_reverse( get_post_ancestors( get_the_ID() ) );
		foreach ( $ancestors as $ancestor_id ) {
			$items[] = array(
				'@type'    => 'ListItem',
				'position' => $position++,
				'name'     => get_the_title( $ancestor_id ),
				'item'     => trailingslashit( get_permalink( $ancestor_id ) ),
			);
		}
		$items[] = array(
			'@type'    => 'ListItem',
			'position' => $position++,
			'name'     => get_the_title(),
			'item'     => trailingslashit( get_permalink() ),
		);
	} elseif ( is_home() ) {
		$blog_id = (int) get_option( 'page_for_posts' );
		$items[] = array(
			'@type'    => 'ListItem',
			'position' => $position++,
			'name'     => $blog_id ? get_the_title( $blog_id ) : __( 'Blog', 'testro' ),
			'item'     => $blog_id ? trailingslashit( get_permalink( $blog_id ) ) : trailingslashit( home_url( '/' ) ),
		);
	} elseif ( is_archive() ) {
		if ( is_year() || is_month() || is_day() ) {
			$year = (int) get_query_var( 'year' );
			if ( $year ) {
				$items[] = array(
					'@type'    => 'ListItem',
					'position' => $position++,
					'name'     => (string) $year,
					'item'     => trailingslashit( get_year_link( $year ) ),
				);
			}
			if ( is_month() || is_day() ) {
				$month = (int) get_query_var( 'monthnum' );
				if ( $year && $month ) {
					$items[] = array(
						'@type'    => 'ListItem',
						'position' => $position++,
						'name'     => date_i18n( 'F', mktime( 0, 0, 0, $month, 1, $year ) ),
						'item'     => trailingslashit( get_month_link( $year, $month ) ),
					);
				}
			}
			if ( is_day() ) {
				$month = (int) get_query_var( 'monthnum' );
				$day   = (int) get_query_var( 'day' );
				if ( $year && $month && $day ) {
					$items[] = array(
						'@type'    => 'ListItem',
						'position' => $position++,
						'name'     => (string) $day,
						'item'     => trailingslashit( get_day_link( $year, $month, $day ) ),
					);
				}
			}
		} else {
			$link = '';
			if ( is_category() || is_tag() || is_tax() ) {
				$term_link = get_term_link( get_queried_object() );
				$link      = is_wp_error( $term_link ) ? '' : trailingslashit( $term_link );
			} elseif ( is_post_type_archive() ) {
				$pta  = get_post_type_archive_link( get_query_var( 'post_type' ) );
				$link = $pta ? trailingslashit( $pta ) : '';
			} elseif ( is_author() ) {
				$link = trailingslashit( get_author_posts_url( (int) get_query_var( 'author' ) ) );
			}

			$item = array(
				'@type'    => 'ListItem',
				'position' => $position++,
				'name'     => wp_strip_all_tags( get_the_archive_title() ),
			);
			if ( $link ) {
				$item['item'] = $link;
			}
			$items[] = $item;
		}
	} elseif ( is_search() ) {
		$items[] = array(
			'@type'    => 'ListItem',
			'position' => $position++,
			'name'     => __( 'Search', 'testro' ),
			'item'     => esc_url_raw( home_url( '/?s=' . rawurlencode( get_search_query() ) ) ),
		);
	} elseif ( is_404() ) {
		$items[] = array(
			'@type'    => 'ListItem',
			'position' => $position++,
			'name'     => __( 'Not Found', 'testro' ),
		);
	}

	return array(
		'@context'        => 'https://schema.org',
		'@type'           => 'BreadcrumbList',
		'itemListElement' => $items,
	);
}

/**
 * FAQPage schema from content helpers.
 *
 * @return array|null
 */
function testro_schema_faq() {
	if ( ! function_exists( 'testro_get_faqs' ) ) {
		return null;
	}

	$product = function_exists( 'testro_get_product_page' ) ? testro_get_product_page() : null;
	$static  = function_exists( 'testro_get_static_page' ) ? testro_get_static_page() : null;

	if ( $product ) {
		$faqs = testro_schema_product_faqs( $product );
		$base = testro_get_canonical_url();
	} elseif ( $static && ! empty( $static['faqs'] ) ) {
		if ( is_array( $static['faqs'] ) ) {
			$faqs = $static['faqs'];
		} elseif ( function_exists( 'testro_get_faq_set' ) ) {
			$faqs = testro_get_faq_set( (string) $static['faqs'] );
		} else {
			$faqs = array();
		}
		$base = testro_get_canonical_url();
	} elseif ( is_front_page() ) {
		$faqs = testro_get_faqs();
		$base = trailingslashit( home_url( '/' ) );
	} else {
		return null;
	}

	if ( ! $faqs ) {
		return null;
	}

	$entities = array();

	foreach ( $faqs as $faq ) {
		$entities[] = array(
			'@type'          => 'Question',
			'name'           => $faq['question'],
			'acceptedAnswer' => array(
				'@type' => 'Answer',
				'text'  => $faq['answer'],
			),
		);
	}

	return array(
		'@context'   => 'https://schema.org',
		'@type'      => 'FAQPage',
		'@id'        => $base . '#faq',
		'mainEntity' => $entities,
	);
}

/**
 * FAQ items rendered by a product page definition.
 *
 * @param array $product Product page definition.
 * @return array[]
 */
function testro_schema_product_faqs( $product ) {
	$sections = isset( $product['sections'] ) && is_array( $product['sections'] ) ? $product['sections'] : array();

	foreach ( $sections as $section ) {
		if ( empty( $section['type'] ) || 'faq' !== $section['type'] ) {
			continue;
		}
		if ( isset( $section['faqs'] ) && is_array( $section['faqs'] ) ) {
			return $section['faqs'];
		}
		if ( isset( $section['faqs'] ) && function_exists( 'testro_get_faq_set' ) ) {
			return testro_get_faq_set( (string) $section['faqs'] );
		}
		return testro_get_faqs();
	}

	return array();
}

/**
 * Product/Offer schema for pricing plans (front page).
 *
 * SaaS-oriented Product nodes with Offer — no GTIN/MPN/shippingDetails so
 * Google Merchant Listings validation is not invited. SoftwareApplication
 * keeps AggregateOffer only to avoid duplicate dense Offer lists.
 *
 * @return array|null
 */
function testro_schema_products() {
	if ( ! is_front_page() || ! function_exists( 'testro_get_pricing_plans' ) ) {
		return null;
	}

	if ( ! apply_filters( 'testro_enable_product_schema', true ) ) {
		return null;
	}

	$image = function_exists( 'testro_asset_webp' )
		? testro_asset_webp( 'images/testrologo.png' )
		: ( TESTRO_URI . '/assets/images/testrologo.png' );

	$products = array();
	foreach ( testro_get_pricing_plans() as $plan ) {
		$id    = isset( $plan['id'] ) ? $plan['id'] : sanitize_title( $plan['name'] );
		$offer = array(
			'@type'         => 'Offer',
			'url'           => trailingslashit( function_exists( 'testro_get_page_url' ) ? testro_get_page_url( 'pricing' ) : home_url( '/pricing/' ) ),
			'priceCurrency' => 'USD',
			'availability'  => 'https://schema.org/InStock',
			'category'      => 'SoftwareApplication',
		);
		if ( isset( $plan['price_monthly'] ) && is_numeric( $plan['price_monthly'] ) ) {
			$offer['price'] = (string) $plan['price_monthly'];
		} else {
			$offer['price']       = '0';
			$offer['description'] = isset( $plan['price_label'] ) ? $plan['price_label'] : 'Contact for pricing';
		}

		$products[] = array(
			'@type'       => 'Product',
			'@id'         => trailingslashit( home_url( '/' ) ) . '#plan-' . $id,
			'name'        => 'theTestRo ' . $plan['name'],
			'description' => isset( $plan['tagline'] ) ? $plan['tagline'] : ( 'theTestRo ' . $plan['name'] . ' plan' ),
			'image'       => $image,
			'brand'       => array(
				'@type' => 'Brand',
				'name'  => 'theTestRo',
			),
			'category'    => 'SoftwareApplication',
			'isRelatedTo' => array( '@id' => trailingslashit( home_url( '/' ) ) . '#software' ),
			'offers'      => $offer,
		);
	}

	if ( ! $products ) {
		return null;
	}

	return array(
		'@context' => 'https://schema.org',
		'@graph'   => $products,
	);
}

/**
 * Article schema for single posts.
 *
 * @return array|null
 */
function testro_schema_article() {
	if ( ! is_singular( 'post' ) ) {
		return null;
	}

	$post_id = get_the_ID();
	$image   = has_post_thumbnail( $post_id )
		? get_the_post_thumbnail_url( $post_id, 'full' )
		: ( function_exists( 'testro_asset_webp' ) ? testro_asset_webp( 'images/testrologo.png' ) : ( TESTRO_URI . '/assets/images/testrologo.png' ) );

	return array(
		'@context'         => 'https://schema.org',
		'@type'            => 'Article',
		'headline'         => get_the_title( $post_id ),
		'datePublished'    => get_the_date( DATE_W3C, $post_id ),
		'dateModified'     => get_the_modified_date( DATE_W3C, $post_id ),
		'author'           => array(
			'@type' => 'Person',
			'name'  => get_the_author_meta( 'display_name', (int) get_post_field( 'post_author', $post_id ) ),
			'url'   => get_author_posts_url( (int) get_post_field( 'post_author', $post_id ) ),
		),
		'publisher'        => array( '@id' => trailingslashit( home_url( '/' ) ) . '#organization' ),
		'image'            => $image,
		'mainEntityOfPage' => array(
			'@type' => 'WebPage',
			'@id'   => trailingslashit( get_permalink( $post_id ) ),
		),
		'description'      => testro_get_meta_description(),
		'inLanguage'       => 'en-US',
		'isPartOf'         => array( '@id' => trailingslashit( home_url( '/' ) ) . '#website' ),
	);
}

/**
 * AggregateRating data from client showcase ratings.
 *
 * @return array|null
 */
function testro_schema_aggregate_rating_data() {
	if ( ! function_exists( 'testro_get_clients' ) ) {
		return null;
	}

	$clients = testro_get_clients();
	$sum     = 0;
	$count   = 0;

	foreach ( $clients as $client ) {
		if ( ! isset( $client['rating'] ) ) {
			continue;
		}
		$sum += (float) $client['rating'];
		$count++;
	}

	if ( $count < 1 ) {
		return null;
	}

	return array(
		'@type'       => 'AggregateRating',
		'ratingValue' => round( $sum / $count, 1 ),
		'bestRating'  => '5',
		'worstRating' => '1',
		'ratingCount' => (string) $count,
	);
}

/**
 * Review schema from testimonials (homepage).
 *
 * @return array|null
 */
function testro_schema_reviews() {
	if ( ! is_front_page() || ! function_exists( 'testro_get_testimonials' ) ) {
		return null;
	}

	$reviews = array();
	foreach ( testro_get_testimonials() as $item ) {
		$reviews[] = array(
			'@type'         => 'Review',
			'author'        => array(
				'@type' => 'Person',
				'name'  => $item['name'],
				'jobTitle' => isset( $item['role'] ) ? $item['role'] : '',
			),
			'reviewBody'    => $item['quote'],
			'reviewRating'  => array(
				'@type'       => 'Rating',
				'ratingValue' => isset( $item['rating'] ) ? (string) $item['rating'] : '5',
				'bestRating'  => '5',
			),
			'itemReviewed'  => array(
				'@id' => trailingslashit( home_url( '/' ) ) . '#software',
			),
		);
	}

	if ( empty( $reviews ) ) {
		return null;
	}

	return array(
		'@context' => 'https://schema.org',
		'@graph'   => $reviews,
	);
}

/**
 * HowTo schema from homepage workflow steps.
 *
 * @return array|null
 */
function testro_schema_howto() {
	if ( ! is_front_page() || ! function_exists( 'testro_get_how_it_works' ) ) {
		return null;
	}

	$steps = array();
	foreach ( testro_get_how_it_works() as $index => $step ) {
		$steps[] = array(
			'@type'    => 'HowToStep',
			'position' => $index + 1,
			'name'     => $step['title'],
			'text'     => $step['description'],
			'url'      => trailingslashit( home_url( '/' ) ) . '#how-it-works',
		);
	}

	return array(
		'@context'    => 'https://schema.org',
		'@type'       => 'HowTo',
		'@id'         => trailingslashit( home_url( '/' ) ) . '#howto',
		'name'        => 'How theTestRo Works',
		'description' => 'Create, edit, and run no-code automated tests with theTestRo.',
		'totalTime'   => 'PT10M',
		'step'        => $steps,
	);
}

/**
 * VideoObject schema for homepage YouTube embeds.
 *
 * @return array|null
 */
function testro_schema_videos() {
	if ( ! is_front_page() || ! function_exists( 'testro_get_videos' ) ) {
		return null;
	}

	$entities = array();
	$upload   = get_option( 'testro_videos_upload_date', '' );
	// Google VideoObject requires ISO 8601 with time + timezone (not date-only).
	if ( $upload && preg_match( '/^\d{4}-\d{2}-\d{2}$/', $upload ) ) {
		$upload_date = $upload . 'T00:00:00+00:00';
	} elseif ( $upload && false !== strtotime( $upload ) ) {
		$upload_date = gmdate( 'c', strtotime( $upload . ' UTC' ) );
	} else {
		$ts = (int) get_option( 'testro_videos_upload_date_ts', filemtime( TESTRO_DIR . '/inc/content.php' ) ?: time() );
		$upload_date = gmdate( 'c', $ts );
	}

	foreach ( testro_get_videos() as $video ) {
		$id = $video['id'];
		$entities[] = array(
			'@type'        => 'VideoObject',
			'name'         => $video['title'],
			'description'  => $video['title'] . ' — Intelligence-powered no-code test automation with theTestRo.',
			'thumbnailUrl' => 'https://i.ytimg.com/vi/' . rawurlencode( $id ) . '/hqdefault.jpg',
			'uploadDate'   => $upload_date,
			'contentUrl'   => 'https://www.youtube.com/watch?v=' . rawurlencode( $id ),
			'embedUrl'     => 'https://www.youtube.com/embed/' . rawurlencode( $id ),
			'publisher'    => array( '@id' => trailingslashit( home_url( '/' ) ) . '#organization' ),
		);
	}

	return array(
		'@context' => 'https://schema.org',
		'@graph'   => $entities,
	);
}

/**
 * Output all relevant schema blocks.
 */
function testro_output_schema() {
	if ( function_exists( 'testro_seo_plugin_active' ) && testro_seo_plugin_active() ) {
		return;
	}

	testro_print_json_ld( testro_schema_organization() );
	testro_print_json_ld( testro_schema_website() );

	$webpage = testro_schema_webpage();
	if ( $webpage ) {
		testro_print_json_ld( $webpage );
	}

	$software = testro_schema_software_application();
	if ( $software ) {
		// Drop null aggregateRating if helper returned null.
		if ( empty( $software['aggregateRating'] ) ) {
			unset( $software['aggregateRating'] );
		}
		testro_print_json_ld( $software );
	}

	$contact = testro_schema_contact_page();
	if ( $contact ) {
		testro_print_json_ld( $contact );
	}

	$howto = testro_schema_howto();
	if ( $howto ) {
		testro_print_json_ld( $howto );
	}

	$videos = testro_schema_videos();
	if ( $videos ) {
		testro_print_json_ld( $videos );
	}

	$reviews = testro_schema_reviews();
	if ( $reviews ) {
		testro_print_json_ld( $reviews );
	}

	$breadcrumbs = testro_schema_breadcrumbs();
	if ( $breadcrumbs ) {
		testro_print_json_ld( $breadcrumbs );
	}

	$faq = testro_schema_faq();
	if ( $faq ) {
		testro_print_json_ld( $faq );
	}

	$products = testro_schema_products();
	if ( $products ) {
		testro_print_json_ld( $products );
	}

	$article = testro_schema_article();
	if ( $article ) {
		testro_print_json_ld( $article );
	}
}
add_action( 'wp_head', 'testro_output_schema', 5 );
