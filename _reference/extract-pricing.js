(() => {
  const pricing =
    document.getElementById("pricing") ||
    [...document.querySelectorAll("div,section")].find(
      (el) =>
        /From Startup to Enterprise/i.test(el.textContent || "") &&
        /What's Included/i.test(el.textContent || "")
    ) ||
    document.body;

  const h3 = [...pricing.querySelectorAll("h3")].find(
    (h) => h.textContent.trim() === "Basic"
  );
  let card = h3;
  for (let i = 0; i < 10; i++) {
    card = card.parentElement;
    if (
      getComputedStyle(card).borderRadius === "24px" &&
      getComputedStyle(card).boxShadow !== "none"
    )
      break;
  }

  function summarize(el, depth = 0) {
    if (!el || depth > 5) return null;
    const cs = getComputedStyle(el);
    const kids = [...el.children]
      .slice(0, 14)
      .map((c) => summarize(c, depth + 1))
      .filter(Boolean);
    const h = el.matches("h3,h4") ? el.textContent.trim() : "";
    return {
      tag: el.tagName.toLowerCase(),
      cls: String(el.className).replace(/\s+/g, " ").trim().slice(0, 180),
      h,
      pad: cs.padding,
      bg:
        cs.backgroundImage !== "none"
          ? cs.backgroundImage.slice(0, 120)
          : cs.backgroundColor,
      bt: `${cs.borderTopWidth} ${cs.borderTopColor}`,
      bb: `${cs.borderBottomWidth} ${cs.borderBottomColor}`,
      mt: cs.marginTop,
      mb: cs.marginBottom,
      flex: cs.flex,
      kids,
    };
  }

  const costRows = [...card.querySelectorAll("div")]
    .filter(
      (d) =>
        /^(Plan Cost|Infra Cost|Total Cost)/.test(d.textContent.trim()) &&
        d.children.length >= 2 &&
        d.textContent.trim().length < 50
    )
    .map((d) => {
      const cs = getComputedStyle(d);
      const label = d.children[0];
      const val = d.children[1];
      return {
        text: d.textContent.trim(),
        cls: String(d.className),
        color: cs.color,
        fontWeight: cs.fontWeight,
        bg: cs.backgroundColor,
        borderTop: cs.borderTop,
        padding: cs.padding,
        margin: cs.margin,
        borderRadius: cs.borderRadius,
        boxShadow: cs.boxShadow,
        labelColor: getComputedStyle(label).color,
        labelWeight: getComputedStyle(label).fontWeight,
        valColor: getComputedStyle(val).color,
        valWeight: getComputedStyle(val).fontWeight,
        valCls: String(val.className),
        valText: val.textContent.trim(),
      };
    });

  const featH4 = [...card.querySelectorAll("h4")].find((h) =>
    h.textContent.includes("Features")
  );
  const featWrap = featH4?.parentElement;
  const featUl = featWrap?.querySelector("ul");
  const includedH4 = [...card.querySelectorAll("h4")].find((h) =>
    h.textContent.includes("What's Included")
  );
  const includedWrap = includedH4?.parentElement;
  const infraH4 = [...card.querySelectorAll("h4")].find((h) =>
    h.textContent.includes("Infra")
  );
  const infraWrap = infraH4?.parentElement;

  // Find middle gradient wrapper (features section outer)
  let bodyInner = includedWrap?.parentElement;

  const exclusive = [...card.querySelectorAll("*")].find(
    (el) =>
      /Exclusive of infra/i.test(el.textContent || "") &&
      el.children.length === 0
  );

  const checkSvg = card.querySelector("svg.lucide-circle-check");
  const checkCircle = checkSvg?.querySelector("circle");
  const checkPath = checkSvg?.querySelector("path");

  // Separators between body panels — walk siblings of included/features wrappers
  const bodyKids = bodyInner
    ? [...bodyInner.children].map((el) => {
        const cs = getComputedStyle(el);
        return {
          cls: String(el.className).replace(/\s+/g, " ").trim().slice(0, 160),
          pad: cs.padding,
          bg:
            cs.backgroundImage !== "none"
              ? cs.backgroundImage.slice(0, 100)
              : cs.backgroundColor,
          bt: `${cs.borderTopWidth} ${cs.borderTopColor}`,
          bb: `${cs.borderBottomWidth} ${cs.borderBottomColor}`,
          mt: cs.marginTop,
          mb: cs.marginBottom,
          flex: cs.flex,
          headings: [...el.querySelectorAll(":scope h4")].map((h) =>
            h.textContent.trim()
          ),
        };
      })
    : [];

  // Hover: temporarily set class if any hover styles via transition
  const before = {
    shadow: getComputedStyle(card).boxShadow,
    transform: getComputedStyle(card).transform,
    border: getComputedStyle(card).border,
  };

  return {
    cardCls: String(card.className),
    cardStyle: {
      width: getComputedStyle(card).width,
      height: getComputedStyle(card).height,
      border: getComputedStyle(card).border,
      borderRadius: getComputedStyle(card).borderRadius,
      boxShadow: getComputedStyle(card).boxShadow,
      padding: getComputedStyle(card).padding,
    },
    before,
    bodyKids,
    included: includedWrap && {
      cls: String(includedWrap.className),
      pad: getComputedStyle(includedWrap).padding,
      bg: getComputedStyle(includedWrap).backgroundColor,
      bt: getComputedStyle(includedWrap).borderTop,
      bb: getComputedStyle(includedWrap).borderBottom,
      parentCls: String(includedWrap.parentElement?.className || "").slice(0, 200),
      parentPad: getComputedStyle(includedWrap.parentElement).padding,
      parentBg:
        getComputedStyle(includedWrap.parentElement).backgroundImage !== "none"
          ? getComputedStyle(includedWrap.parentElement).backgroundImage.slice(0, 120)
          : getComputedStyle(includedWrap.parentElement).backgroundColor,
      grandCls: String(
        includedWrap.parentElement?.parentElement?.className || ""
      ).slice(0, 200),
      grandPad: includedWrap.parentElement?.parentElement
        ? getComputedStyle(includedWrap.parentElement.parentElement).padding
        : null,
      grandBg: includedWrap.parentElement?.parentElement
        ? getComputedStyle(includedWrap.parentElement.parentElement)
            .backgroundImage !== "none"
          ? getComputedStyle(
              includedWrap.parentElement.parentElement
            ).backgroundImage.slice(0, 120)
          : getComputedStyle(includedWrap.parentElement.parentElement)
              .backgroundColor
        : null,
    },
    features: featWrap && {
      cls: String(featWrap.className),
      pad: getComputedStyle(featWrap).padding,
      bg:
        getComputedStyle(featWrap).backgroundImage !== "none"
          ? getComputedStyle(featWrap).backgroundImage.slice(0, 120)
          : getComputedStyle(featWrap).backgroundColor,
      parentCls: String(featWrap.parentElement?.className || "").slice(0, 200),
      parentPad: getComputedStyle(featWrap.parentElement).padding,
      parentBg:
        getComputedStyle(featWrap.parentElement).backgroundImage !== "none"
          ? getComputedStyle(featWrap.parentElement).backgroundImage.slice(0, 120)
          : getComputedStyle(featWrap.parentElement).backgroundColor,
      parentBt: getComputedStyle(featWrap.parentElement).borderTop,
      parentBb: getComputedStyle(featWrap.parentElement).borderBottom,
      parentMt: getComputedStyle(featWrap.parentElement).marginTop,
      parentRadius: getComputedStyle(featWrap.parentElement).borderRadius,
      ulGap: featUl ? getComputedStyle(featUl).gap : null,
      ulCls: featUl ? String(featUl.className) : null,
      liGap: featUl?.children[0]
        ? getComputedStyle(featUl.children[0]).gap
        : null,
    },
    infra: infraWrap && {
      cls: String(infraWrap.className),
      pad: getComputedStyle(infraWrap).padding,
      bg:
        getComputedStyle(infraWrap).backgroundImage !== "none"
          ? getComputedStyle(infraWrap).backgroundImage.slice(0, 160)
          : getComputedStyle(infraWrap).backgroundColor,
      bt: getComputedStyle(infraWrap).borderTop,
      radius: getComputedStyle(infraWrap).borderRadius,
      shadow: getComputedStyle(infraWrap).boxShadow,
      h4Color: getComputedStyle(infraH4).color,
      h4Weight: getComputedStyle(infraH4).fontWeight,
      h4Html: infraH4.innerHTML.slice(0, 300),
    },
    costRows,
    exclusive: exclusive && {
      text: exclusive.textContent,
      color: getComputedStyle(exclusive).color,
      fontSize: getComputedStyle(exclusive).fontSize,
      cls: String(exclusive.className),
    },
    check: checkSvg && {
      cls: checkSvg.getAttribute("class"),
      width: getComputedStyle(checkSvg).width,
      height: getComputedStyle(checkSvg).height,
      color: getComputedStyle(checkSvg).color,
      circleFill: checkCircle ? getComputedStyle(checkCircle).fill : null,
      circleStroke: checkCircle ? getComputedStyle(checkCircle).stroke : null,
      pathFill: checkPath ? getComputedStyle(checkPath).fill : null,
      pathStroke: checkPath ? getComputedStyle(checkPath).stroke : null,
      attrFill: checkSvg.getAttribute("fill"),
    },
    tree: summarize(card),
  };
})();
