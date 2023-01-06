(function (blocks, editor, i18n, element) {
    var el = element.createElement;
    var registerBlockType = blocks.registerBlockType;
    var InnerBlocks=editor.InnerBlocks;
    var PlainText = editor.PlainText;
    var URLInput = editor.URLInput;
    registerBlockType('ccc-blocks/links-block', {
        title: i18n.__('Side-C', 'ccc_blocks'),
        description: i18n.__('A custom block for displaying links block section', 'ccc_blocks'),
        icon: 'id',
        category: 'ccc_blocks',
        attributes:{
            title:{
                type: "text",
                selector: "h3",
            },
            links: {
                type: "array",
                source: "query",
                default: [],
               selector: ".side_bar_block ul li",
                query: {
                    link_text: {
                        type: "string",
                        source: "html",
                        selector: "a"
                    },
                    link_url: {
                        type: "url",
                        source: 'attribute',
                        selector: 'a',
                        attribute: 'href'
                    }
                }
            }

        },
        deprecated: [{
            attributes:{
                title:{
                    type: "text",
                    selector: "h3",
                },
                links: {
                    type: "array",
                    source: "query",
                    default: [],
                    selector: ".side_bar_block ul li",
                    query: {
                        link_text: {
                            type: "string",
                            source: "html",
                            selector: "a"
                        },
                        link_url: {
                            type: "url",
                            source: 'attribute',
                            selector: 'a',
                            attribute: 'href'
                        }
                    }
                }

            },
            save: function(props) {
                var links  = props.attributes.links; // Content in our block.
                var title = props.attributes.title;
                var linksListFirst = []; /*links.map(function (link){
                return (el("li",{style: {marginLeft: "0px !important", marginRight: "0px !important"}},
                    el("a",{ href: link.link_url,
                            style: { color: "#006599", textDecoration: "underline"}},
                        link.link_text)));
            });*/
                var linksListSecond = [];
                var middle_count = Math.floor(links.length/2);
                for ( i=0; i<middle_count; i++){
                    linksListFirst.push(el("li",{style: {marginLeft: "0px !important", marginRight: "0px !important"}},
                        el("a",{ href: links[i].link_url,
                                style: { color: "#006599", textDecoration: "underline"}},
                            links[i].link_text)) );
                }
                for ( i=middle_count; i<links.length; i++ ){
                    linksListSecond.push(el("li",{style: {marginLeft: "0px !important", marginRight: "0px !important"}},
                        el("a",{ href: links[i].link_url,
                                style: { color: "#006599", textDecoration: "underline"}},
                            links[i].link_text)) );
                }
                return (el("div",{className: "side_bar_block row"},
                    el("h3",{style: {fontWeight: "bold", marginBottom: "10px"}},title),
                    el("div",{className: "vc_col-xs-6 vc_col-sm-12 vc_col-md-12",
                            style: {minWidth: "180px"}},
                        el("ul",{style:{ listStyle: "none", padding: "0px", margin: "0px"}},
                            linksListFirst)),
                    el("div",{className: "vc_col-xs-6 vc_col-sm-12 vc_col-md-12",
                            style: {minWidth: "180px"}},
                        el("ul",{style:{ listStyle: "none", padding: "0px", margin: "0px"}},
                            linksListSecond))
                ));
            },
        },{
            attributes:{
                title:{
                    type: "text",
                    selector: "h3",
                },
                links: {
                    type: "array",
                    source: "query",
                    default: [],
                    selector: ".side_bar_block ul li",
                    query: {
                        link_text: {
                            type: "string",
                            source: "html",
                            selector: "a"
                        },
                        link_url: {
                            type: "url",
                            source: 'attribute',
                            selector: 'a',
                            attribute: 'href'
                        }
                    }
                }

            },
            save: function(props) {
                var links  = props.attributes.links; // Content in our block.
                var title = props.attributes.title;
                var linksList = [];
                for ( i=0; i<links.length; i++){
                    linksList.push(el("li",{className: "list_items"},
                        el("a",{ href: links[i].link_url,
                                className: "item_link"},
                            links[i].link_text)) );
                }
                return (el("div",{className: "side_bar_block row"},
                    el("h3",{},title),
                    el("div",{className: "vc_col-xs-12"},
                        el("ul",{},
                            linksList))
                ));
            }
        }],
        edit: function edit(props) {
            var links  = props.attributes.links.slice();
            var attributes = props.attributes;
            /*var index = -1;*/
            var linksList = links/*.sort(function (a,b) {
                            return a.index - b.index;
             })*/.map(function (link,index) {

                    return (el("div",{className: "wp-block-cgb-link-block"},
                                el("p",{},
                                    el("span",{},i18n.__("Insert Link here:","ccc_blocks")),
                                    el("span",{className: "remove-link dashicons dashicons-no",
                                            style: {float: "right"},
                                            onClick: function () {
                                               links.splice(index,1);
                                            /*var newLinks = links
                                                .filter(function (item ){ return item.index !== link.index;})
                                                .map(function (t) {
                                                    if (t.index > link.index) {
                                                        t.index -= 1;
                                                    }

                                                    return t;
                                                });*/
                                                props.setAttributes({
                                                    links: links
                                                });
                                        }})),
                                el("blockquote",{className:"wp-block-quote"},
                                    el(PlainText,{className: "content-plain-text",
                                        placeholder: i18n.__("Link text","ccc_blocks"),
                                        value: link.link_text,
                                        keepPlaceholderOnFocus: true,
                                        onChange: function (content) {
                                            var newObject = Object.assign({}, link, {
                                                                link_text: content
                                                                });
                                            links[index]=newObject;
                                            /*var newLinks = links.filter(function (item){ return item.index !== link.index} );
                                            newLinks.push(newObject);*/
                                            props.setAttributes({
                                                links: links});
                                        }}),
                                    el(URLInput,{className: "url-plain-text uri_input",
                                        key: 'editable',
                                        placeholder: i18n.__("Link URL","ccc_blocks"),
                                        value: link.link_url,
                                        onChange: function (url) {
                                            var newObject = Object.assign({}, link, {
                                                link_url: url
                                            });
                                            links[index]=newObject;
                                                /*var newLinks = links.filter(function (item){ return item.index !== link.index} );
                                                newLinks.push(newObject);*/
                                            props.setAttributes({
                                                links: links});
                                        }})
                                )
                            )
                        );
                    });
            return [el("div",{ className: 'side_bar_block' },
                     el(PlainText,{className: "content-plain-text",
                         key: 'editable',
                         placeholder: i18n.__("Title","ccc_blocks"),
                         value: attributes.title,
                         keepPlaceholderOnFocus: true,
                         onChange: function (title) {
                             props.setAttributes({
                                 title: title});
                         }}),
                     linksList,
                     el("button",{className:"add-more-link",
                         onClick: function (content) {
                             links.push({
                                 /*index: props.attributes.links.length,*/
                                 link_text: "",
                                 link_url: ""
                             });
                            props.setAttributes({
                                links: links
                            });
                         }},"+"
                     )
                    )
            ];
        },
        save: function(props) {
            var links  = props.attributes.links; // Content in our block.
            var title = props.attributes.title;
            var linksList = [];
             for ( i=0; i<links.length; i++){
                linksList.push(el("li",{className: "list_items"},
                    el("a",{ href: links[i].link_url,
                            className: "item_link",
                            target: (is_external_link(links[i].link_url))? "_blank" : "_self",
                            rel: "noopener noreferrer"
                            },
                        links[i].link_text)) );
            }
            return (el("div",{className: "side_bar_block row"},
                        el("h3",{},title),
                el("div",{className: "vc_col-xs-12"},
                    el("ul",{},
                        linksList))
            ));
        }
    });
})(
    window.wp.blocks,
    window.wp.editor,
    window.wp.i18n,
    window.wp.element

);

function is_external_link(url) {
    var link = document.createElement('a');
    link.href = url;
    return link.hostname !== window.location.hostname;
}
