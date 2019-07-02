var doRemove = {"remove": 1},
 doNotRemove = {"remove": 0},
 wysihtml5ParserRules = {
    "classes": {
        "wysiwyg-font-size-larger":  1,
        "wysiwyg-text-align-center": 1
    },

    "tags": {
        "check_attributes": {
            "href":     "doRemove"
        },
        "abbr":         doNotRemove,
        "acronym":      doNotRemove,
        "address":      doNotRemove,
        "applet":       doRemove,
        "area":         doNotRemove,
        "article":      doNotRemove,
        "aside":        doNotRemove,
        "audio":        doNotRemove,
        "b":            doNotRemove,
        "base":         doNotRemove,
        "bdi":          doNotRemove,
        "bdo":          doNotRemove,
        "blockquote":   doNotRemove,
        "body":         doNotRemove,
        "br":           doNotRemove,
        "button":       doNotRemove,
        "canvas":       doNotRemove,
        "caption":      doNotRemove,
        "cite":         doNotRemove,
        "code":         doNotRemove,
        "col":          doNotRemove,
        "colgroup":     doNotRemove,
        "command":      doNotRemove,
        "datalist":     doNotRemove,
        "dd":           doNotRemove,
        "del":          doNotRemove,
        "details":      doNotRemove,
        "dfn":          doNotRemove,
        "dialog":       doNotRemove,
        "div":          doNotRemove,
        "dl":           doNotRemove,
        "dt":           doNotRemove,
        "em":           doNotRemove,
        "embed":        doRemove,
        "fieldset":     doNotRemove,
        "figcaption":   doNotRemove,
        "figure":       doNotRemove,
        "footer":       doNotRemove,
        "form":         doNotRemove,
        "h1":           doNotRemove,
        "h2":           doNotRemove,
        "h3":           doNotRemove,
        "h4":           doNotRemove,
        "h5":           doNotRemove,
        "h6":           doNotRemove,
        "head":         doNotRemove,
        "header":       doNotRemove,
        "hgroup":       doNotRemove,
        "hr":           doNotRemove,
        "html":         doNotRemove,
        "i":            doNotRemove,
        "iframe":       doRemove,
        "img":          doNotRemove,
        "input":        doNotRemove,
        "ins":          doNotRemove,
        "kbd":          doNotRemove,
        "keygen":       doNotRemove,
        "label":        doNotRemove,
        "legend":       doNotRemove,
        "li":           doNotRemove,
        "link":         doRemove,
        "map":          doNotRemove,
        "mark":         doNotRemove,
        "menu":         doNotRemove,
        "meta":         doNotRemove,
        "meter":        doNotRemove,
        "nav":          doNotRemove,
        "noscript":     doNotRemove,
        "object":       doRemove,
        "ol":           doNotRemove,
        "optgroup":     doNotRemove,
        "option":       doNotRemove,
        "output":       doNotRemove,
        "p":            doNotRemove,
        "param":        doNotRemove,
        "pre":          doNotRemove,
        "progress":     doNotRemove,
        "q":            doNotRemove,
        "rp":           doNotRemove,
        "rt":           doNotRemove,
        "ruby":         doNotRemove,
        "s":            doNotRemove,
        "samp":         doNotRemove,
        "script":       doNotRemove,
        "section":      doNotRemove,
        "select":       doNotRemove,
        "small":        doNotRemove,
        "source":       doNotRemove,
        "span":         doNotRemove,
        "strong":       doNotRemove,
        "style":        doNotRemove,
        "sub":          doNotRemove,
        "summary":      doNotRemove,
        "sup":          doNotRemove,
        "table":        doNotRemove,
        "tbody":        doNotRemove,
        "td":           doNotRemove,
        "textarea":     doNotRemove,
        "tfoot":        doNotRemove,
        "th":           doNotRemove,
        "thead":        doNotRemove,
        "time":         doNotRemove,
        "title":        doNotRemove,
        "tr":           doNotRemove,
        "track":        doNotRemove,
        "u":            doNotRemove,
        "ul":           doNotRemove,
        "var":          doNotRemove,
        "video":        doNotRemove,
        "wbr":          doNotRemove
    }
};

wysihtml5ParserRules.tags.basefont = doRemove;
wysihtml5ParserRules.tags.big = {
    "rename_tag":     "span",
    "set_class":      "wysiwyg-font-size-larger"
};
wysihtml5ParserRules.tags.center   = {
    "rename_tag":     "span",
    "set_class":      "wysiwyg-text-align-center"
};
wysihtml5ParserRules.tags.dir      = doRemove;
wysihtml5ParserRules.tags.font     = {
    "rename_tag":     "span"
},
wysihtml5ParserRules.tags.frame    = doRemove;
wysihtml5ParserRules.tags.frameset = doRemove;
wysihtml5ParserRules.tags.noframes = doRemove;
wysihtml5ParserRules.tags.strike   = {
    "rename_tag":     "span",
    "set_attributes": {
        "style":      "text-decoration:line-through;"
    }
};
wysihtml5ParserRules.tags.tt       = {
    "rename_tag":     "span"
}
