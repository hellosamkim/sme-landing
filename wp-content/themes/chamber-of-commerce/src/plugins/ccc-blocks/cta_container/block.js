function create_cta_container(block_name, block_title, block_description, cta_type, cta_count_min, cta_count_max, build_custom_class) {
    (function (blocks, editor, components, i18n, element) {
        var el = element.createElement;
        var registerBlockType = blocks.registerBlockType;
        var PanelBody = components.PanelBody;
        var RangeControl = components.RangeControl;
        var InspectorControls = editor.InspectorControls;
        var InnerBlocks = editor.InnerBlocks;
        var PlainText = editor.PlainText;
        var URLInput = editor.URLInput;
        var PanelColorSettings = editor.PanelColorSettings;
        registerBlockType(block_name, {
            title: i18n.__(block_title, 'cta-container-block'),
            description: i18n.__(block_description, 'cta-container-block'),
            icon: 'id',
            category: 'ccc_blocks',
            attributes: {
                title: {
                    type: 'text',
                    selector: 'h4'
                },
                text: {
                    type: 'text',
                    selector: 'p'
                },
                elements: {
                    type: "number",
                    default: cta_count_min
                },
                backgroundColor: {
                    type: 'string',
                    default: '#f8fafb'
                },
                btnMoreURL: {
                    type: 'url'
                },
                btnMoreText: {
                    type: 'url'
                }
            },
            edit: function (props) {
                var attributes = props.attributes;
                var clientId = props.clientId;
                var innerBlocks = wp.data.select('core/editor').getBlocksByClientId(clientId)[0].innerBlocks;
                innerBlocks.forEach(function (block) {
                    var current_class = build_custom_class(innerBlocks.length);
                    wp.data.dispatch('core/editor').updateBlockAttributes(block.clientId, {column_class: current_class});
                });

                return [
                    el(InspectorControls, {key: 'inspector'},
                        el(PanelBody, {
                                title: i18n.__('Container for Call To Actions', 'cta-container-block'),
                                className: 'block-content',
                                initialOpen: true
                            },
                            el('p', {}, i18n.__('Add custom meta options to your block', 'cta-container-block')),
                            el(RangeControl, {
                                label: i18n.__('Number of Call To Actions', 'cta-container-block'),
                                className: 'my-block-button',
                                value: attributes.elements,
                                min: cta_count_min,
                                max: cta_count_max,
                                onChange: function (count) {
                                    props.setAttributes({elements: count});
                                }
                            }),
                            el(PanelColorSettings, {
                                title: 'Color Settings',
                                colorSettings: [{
                                    value: attributes.backgroundColor,
                                    label: 'Background Color',
                                    onChange: function (color) {
                                        console.log(color);
                                        props.setAttributes({backgroundColor: color});
                                    }
                                }]
                            }),
                            el('p', {}, i18n.__('Configure the See More Button in your block', 'cta-container-block')),
                            el(PlainText, {
                                key: 'editable',
                                placeholder: i18n.__('Text of See More Button', 'cta-container-block'),
                                keepPlaceholderOnFocus: true,
                                value: attributes.btnMoreText,
                                onChange: function (newTitle) {
                                    props.setAttributes({btnMoreText: newTitle});
                                }
                            }),
                            el(URLInput, {
                                key: 'editable',
                                className: 'my-block-button',
                                value: attributes.btnMoreURL,
                                onChange: function (buttonUrl, post) {
                                    props.setAttributes({btnMoreURL: buttonUrl});
                                }
                            })
                        )
                    ),
                    el('div', {
                            className: 'my-block-content'
                        },
                        el(PlainText, {
                            key: 'editable',
                            tagName: 'h2',
                            className: 'my-block-title',
                            placeholder: i18n.__('Title of the Container', 'call-to-action-a-block'),
                            keepPlaceholderOnFocus: true,
                            value: attributes.title,
                            onChange: function (newTitle) {
                                props.setAttributes({title: newTitle});
                            }
                        }),
                        el(PlainText, {
                            key: 'editable',
                            tagName: 'p',
                            className: 'my-block-text',
                            placeholder: i18n.__('Description Text', 'call-to-action-a-block'),
                            keepPlaceholderOnFocus: true,
                            value: attributes.text,
                            onChange: function (newTitle) {
                                props.setAttributes({text: newTitle});
                            }
                        }),
                        el(InnerBlocks, {
                            allowedBlocks: [cta_type],
                            template: get_cta_container_template(attributes.elements, cta_type),
                            templateLock: "all"
                        }))
                ];
            },
            save: function (props) {
                var attributes = props.attributes;
                return (
                    el('div', {style: {backgroundColor: attributes.backgroundColor}},
                        /*el('div', {className: 'container'},*/
                        el('div', {className: 'row vc_row vc_row-flex'},
                            el('div', {className: 'vc_col-xs-12'},
                                el('h2', {style: (attributes.title===undefined || attributes.title==="")? {display: "none"} : {}}, attributes.title),
                                el('p', {className: 'cta_container_desc',style: (attributes.text===undefined || attributes.text==="")? {display: "none"} : {}}, attributes.text)),
                            el(InnerBlocks.Content)),
                        el("div", {className: 'row vc_row'},
                            el("div", {
                                    className: "see_more",
                                    style: {
                                       display: (attributes.btnMoreText === null || attributes.btnMoreText === undefined || attributes.btnMoreText === "") ? "none" : "block"
                                    }
                                },
                                el("a", {className: "link_chevron_right see_more_link", href: attributes.btnMoreURL},
                                    el("span", {className: "circled see_more_img"},
                                        el("div", {className: "arrow_right"})
                                    ),
                                    el("span", {className: "see_more_text"}, attributes.btnMoreText)
                                )
                            )
                        )

                        /* )*/
                    )
                );
            },
            deprecated:[{
                attributes: {
                    title: {
                        type: 'text',
                        selector: 'h4'
                    },
                    text: {
                        type: 'text',
                        selector: 'p'
                    },
                    elements: {
                        type: "number",
                        default: cta_count_min
                    },
                    backgroundColor: {
                        type: 'string',
                        default: '#f8fafb'
                    },
                    btnMoreURL: {
                        type: 'url'
                    },
                    btnMoreText: {
                        type: 'url'
                    }
                },
                save: function (props) {
                    var attributes = props.attributes;
                    return (
                        el('div', {style: {backgroundColor: attributes.backgroundColor}},
                            /*el('div', {className: 'container'},*/
                            el('div', {className: 'row vc_row vc_row-flex'},
                                el('div', {className: 'vc_col-xs-12'}, el('h2', {}, attributes.title), el('p', {className: 'cta_container_desc'}, attributes.text)),
                                el(InnerBlocks.Content)),
                            el("div", {className: 'row vc_row'},
                                el("div", {
                                        style: {
                                            paddingBottom: "50px",
                                            paddingRight: "50px",
                                            float: "right",
                                            display: (attributes.btnMoreText === null || attributes.btnMoreText === undefined || attributes.btnMoreText === "") ? "none" : ""
                                        }
                                    },
                                    el("a", {className: "link_chevron_right see_more_link", href: attributes.btnMoreURL},
                                        el("span", {className: "circled see_more_img"},
                                            el("div", {className: "arrow_right"})
                                        ),
                                        el("span", {className: "see_more_text"}, attributes.btnMoreText)
                                    )
                                )
                            )

                            /* )*/
                        )
                    );
                },
            },{
                attributes: {
                    title: {
                        type: 'text',
                        selector: 'h4'
                    },
                    text: {
                        type: 'text',
                        selector: 'p'
                    },
                    elements: {
                        type: "number",
                        default: cta_count_min
                    },
                    backgroundColor: {
                        type: 'string',
                        default: '#f8fafb'
                    },
                    btnMoreURL: {
                        type: 'url'
                    },
                    btnMoreText: {
                        type: 'url'
                    }
                },
                save: function (props) {
                    var attributes = props.attributes;
                    return (
                        el('div', {style: {backgroundColor: attributes.backgroundColor}},
                            /*el('div', {className: 'container'},*/
                            el('div', {className: 'row vc_row vc_row-flex'},
                                el('div', {className: 'vc_col-xs-12'},
                                    el('h2', {style: (attributes.title===undefined || attributes.title==="")? {display: "none"} : {}}, attributes.title),
                                    el('p', {className: 'cta_container_desc',style: (attributes.text===undefined || attributes.text==="")? {display: "none"} : {}}, attributes.text)),
                                el(InnerBlocks.Content)),
                            el("div", {className: 'row vc_row'},
                                el("div", {
                                        style: {
                                            paddingBottom: "50px",
                                            paddingRight: "50px",
                                            float: "right",
                                            display: (attributes.btnMoreText === null || attributes.btnMoreText === undefined || attributes.btnMoreText === "") ? "none" : ""
                                        }
                                    },
                                    el("a", {className: "link_chevron_right see_more_link", href: attributes.btnMoreURL},
                                        el("span", {className: "circled see_more_img"},
                                            el("div", {className: "arrow_right"})
                                        ),
                                        el("span", {className: "see_more_text"}, attributes.btnMoreText)
                                    )
                                )
                            )

                            /* )*/
                        )
                    );
                },
            }]
        });
    })(
        window.wp.blocks,
        window.wp.editor,
        window.wp.components,
        window.wp.i18n,
        window.wp.element
    );
}

function get_cta_container_template(elements, template) {
    var times = lodash.times;
    return times(elements, function (elements) {
        return [template];
    });
}

function build_custom_class(count) {
    var current_class = '';
    if (count === 1) {
        current_class = 'vc_col-xs-12';
    } else if (count === 2) {
        current_class = 'vc_col-xs-12 vc_col-sm-6';
    } else if (count === 3) {
        current_class = 'vc_col-xs-12 vc_col-sm-6 vc_col-md-4';
    }
    else current_class = 'vc_col-xs-12 vc_col-sm-6';

    return current_class;
}

create_cta_container('ccc-blocks/cta-container-type-a', 'Call to Action Container: Type "A"', 'description',
    'ccc-blocks/cta-a', 1, 3, build_custom_class);

create_cta_container('ccc-blocks/cta-container-type-b', 'Call to Action Container: Type "B"', 'description',
    'ccc-blocks/cta-b', 1, 2, build_custom_class);

create_cta_container('ccc-blocks/cta-container-type-c', 'Call to Action Container: Type "C"', 'description',
    'ccc-blocks/cta-c', 2, 4, build_custom_class);

create_cta_container('ccc-blocks/cta-container-type-d', 'Call to Action Container: Type "D"', 'description',
    'ccc-blocks/cta-d', 1, 4, build_custom_class);

function create_infinite_cta_container(block_name, block_title, block_description, cta_type) {
    (function (blocks, editor, components, i18n, element) {
        var el = element.createElement;
        var registerBlockType = blocks.registerBlockType;
        var InnerBlocks = editor.InnerBlocks;
        var PlainText = editor.PlainText;
        var InspectorControls = editor.InspectorControls;
        var PanelBody = components.PanelBody;
        var URLInput = editor.URLInput;
        registerBlockType(block_name, {
            title: i18n.__(block_title, 'cta-container-block'),
            description: i18n.__(block_description, 'cta-container-block'),
            icon: 'id',
            category: 'ccc_blocks',
            attributes: {
                title: {
                    type: 'text',
                    selector: 'h4'
                },
                text: {
                    type: 'text',
                    selector: 'p'
                },
                btnMoreURL: {
                    type: 'url'
                },
                btnMoreText: {
                    type: 'url'
                }
            },
            edit: function (props) {
                var attributes = props.attributes;
                return [
                    el(InspectorControls, {key: 'inspector'},
                        el(PanelBody, {
                                title: i18n.__('Container for Call To Actions', 'cta-container-block'),
                                className: 'block-content',
                                initialOpen: true
                            },
                            el('p', {}, i18n.__('Add custom meta options to your block', 'cta-container-block')),
                            el('p', {}, i18n.__('Configure the See More Button in your block', 'cta-container-block')),
                            el(PlainText, {
                                key: 'editable',
                                placeholder: i18n.__('Text of See More Button', 'cta-container-block'),
                                keepPlaceholderOnFocus: true,
                                value: attributes.btnMoreText,
                                onChange: function (newTitle) {
                                    props.setAttributes({btnMoreText: newTitle});
                                }
                            }),
                            el(URLInput, {
                                key: 'editable',
                                className: 'my-block-button',
                                value: attributes.btnMoreURL,
                                onChange: function (buttonUrl, post) {
                                    props.setAttributes({btnMoreURL: buttonUrl});
                                }
                            })
                        )
                    ), el('div', {},
                        el(PlainText, {
                            key: 'editable',
                            tagName: 'h2',
                            className: 'my-block-title',
                            placeholder: i18n.__('Title of the Container', 'cta-container-block'),
                            keepPlaceholderOnFocus: true,
                            value: attributes.title,
                            onChange: function (newTitle) {
                                props.setAttributes({title: newTitle});
                            }
                        }),
                        el(PlainText, {
                            key: 'editable',
                            tagName: 'p',
                            className: 'my-block-text',
                            placeholder: i18n.__('Description Text', 'cta-container-block'),
                            keepPlaceholderOnFocus: true,
                            value: attributes.text,
                            onChange: function (newTitle) {
                                props.setAttributes({text: newTitle});
                            }
                        }),
                        el(InnerBlocks, {template: [[cta_type]], allowedBlocks: [cta_type]}))
                ];
            },
            save: function (props) {
                var attributes = props.attributes;
                return (
                    el('section', {},
                        el("div", {className: 'vc_section vc_row vc_row-flex'},
                            el('div', {className: 'vc_col-xs-12'},
                                el('h2', {style: (attributes.title===undefined || attributes.title==="")? {display: "none"} : {}}, attributes.title),
                                el('p', {className: 'cta_container_desc',style: (attributes.text===undefined || attributes.text==="")? {display: "none"} : {}}, attributes.text)),
                            el(InnerBlocks.Content, null)
                        ),
                        el("div", {className: 'row vc_row'},
                            el("div", {
                                    className: "see_more",
                                    style: {
                                        display: (attributes.btnMoreText === null || attributes.btnMoreText === undefined || attributes.btnMoreText === "") ? "none" : "block"
                                    }
                                },
                                el("a", {className: "link_chevron_right see_more_link", href: attributes.btnMoreURL},
                                    el("span", {className: "circled see_more_img"},
                                        el("div", {className: "arrow_right"})
                                    ),
                                    el("span", {className: "see_more_text"}, attributes.btnMoreText)
                                )
                            )
                        )
                    ) );
            },
            deprecated: [{
                attributes: {
                    title: {
                        type: 'text',
                        selector: 'h4'
                    },
                    text: {
                        type: 'text',
                        selector: 'p'
                    },
                    btnMoreURL: {
                        type: 'url'
                    },
                    btnMoreText: {
                        type: 'url'
                    }
                },
                save: function (props) {
                    var attributes = props.attributes;
                    return (
                        el('section', {},
                            el("div", {className: 'vc_section vc_row vc_row-flex'},
                                el('div', {className: 'vc_col-xs-12'}, el('h2', {}, attributes.title), el('p', {}, attributes.text)),
                                el(InnerBlocks.Content, null)
                            ),
                            el("div", {className: 'row vc_row'},
                                el("div", {
                                        style: {
                                            paddingBottom: "50px",
                                            paddingRight: "50px",
                                            float: "right",
                                            display: (attributes.btnMoreText === null || attributes.btnMoreText === undefined || attributes.btnMoreText === "") ? "none" : ""
                                        }
                                    },
                                    el("a", {className: "link_chevron_right see_more_link", href: attributes.btnMoreURL},
                                        el("span", {className: "circled see_more_img"},
                                            el("div", {className: "arrow_right"})
                                        ),
                                        el("span", {className: "see_more_text"}, attributes.btnMoreText)
                                    )
                                )
                            )
                        ) );
                }
            },{
                attributes: {
                    title: {
                        type: 'text',
                        selector: 'h4'
                    },
                    text: {
                        type: 'text',
                        selector: 'p'
                    },
                    btnMoreURL: {
                        type: 'url'
                    },
                    btnMoreText: {
                        type: 'url'
                    }
                },
                save: function (props) {
                    var attributes = props.attributes;
                    return (
                        el('section', {},
                            el("div", {className: 'vc_section vc_row vc_row-flex'},
                                el('div', {className: 'vc_col-xs-12'},
                                    el('h2', {style: (attributes.title===undefined || attributes.title==="")? {display: "none"} : {}}, attributes.title),
                                    el('p', {className: 'cta_container_desc',style: (attributes.text===undefined || attributes.text==="")? {display: "none"} : {}}, attributes.text)),
                                el(InnerBlocks.Content, null)
                            ),
                            el("div", {className: 'row vc_row'},
                                el("div", {
                                        style: {
                                            paddingBottom: "50px",
                                            paddingRight: "50px",
                                            float: "right",
                                            display: (attributes.btnMoreText === null || attributes.btnMoreText === undefined || attributes.btnMoreText === "") ? "none" : ""
                                        }
                                    },
                                    el("a", {className: "link_chevron_right see_more_link", href: attributes.btnMoreURL},
                                        el("span", {className: "circled see_more_img"},
                                            el("div", {className: "arrow_right"})
                                        ),
                                        el("span", {className: "see_more_text"}, attributes.btnMoreText)
                                    )
                                )
                            )
                        ) );
                }
            }]
        });
    })(
        window.wp.blocks,
        window.wp.editor,
        window.wp.components,
        window.wp.i18n,
        window.wp.element
    );
}

create_infinite_cta_container('ccc-blocks/cta-container-type-e', 'Call to Action Container: Type "E"', 'description', 'ccc-blocks/cta-e');
create_infinite_cta_container('ccc-blocks/cta-container-type-f', 'Call to Action Container: Type "F"', 'description', 'ccc-blocks/cta-f');
create_infinite_cta_container('ccc-blocks/cta-container-type-g', 'Call to Action Container: Type "G"', 'description', 'ccc-blocks/cta-g');
create_infinite_cta_container('ccc-blocks/faq-container', 'FAQ Container', 'description', 'ccc-blocks/faq');