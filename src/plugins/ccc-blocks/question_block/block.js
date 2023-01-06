(function (blocks, editor, components, i18n, element) {
    var el = element.createElement;
    var registerBlockType = blocks.registerBlockType;
    var RichText = editor.RichText;
    var PlainText = editor.PlainText;
    var InspectorControls = editor.InspectorControls;
    var TextControl = components.TextControl;
    var CheckControl = components.CheckboxControl;
    var URLInput = editor.URLInput;

    registerBlockType('ccc-blocks/question-block', {
        title: i18n.__('Side-B', 'ccc_blocks'),
        description: i18n.__('A custom block for displaying question block section', 'ccc_blocks'),
        icon: 'id',
        category: 'ccc_blocks',
        attributes: {
            title: {
                type: 'text',
                selector: 'h4'
            },
            text: {
                type: 'text',
                selector: 'h5'
            },
            haveContactInfo: {
                type: 'boolean',
                default: 'true'
            },
            contact_name: {
                type: 'text',
                selector: 'h6'
            },
            contact_role: {
                type: 'text',
                selector: 'h6'
            },
            contact_email: {
                type: 'text',
                selector: 'h6'
            },
            contact_phone: {
                type: 'text',
                selector: 'h6'
            },
            haveButton: {
                type: 'boolean',
                default: 'true'
            },
            buttonText: {
                type: 'text',
                selector: 'a',
                default: i18n.__('Call to Action', 'ccc_blocks'),
            },
            buttonURL: {
                type: 'url',
                /*source: 'attribute',
                selector: 'a',
                attribute: 'href'*/
            }
        },
        deprecated: [{
            attributes: {
                title: {
                    type: 'text',
                    selector: 'h4'
                },
                text: {
                    type: 'text',
                    selector: 'h5'
                },
                haveContactInfo: {
                    type: 'boolean',
                    default: 'true'
                },
                contact_name: {
                    type: 'text',
                    selector: 'h6'
                },
                contact_role: {
                    type: 'text',
                    selector: 'h6'
                },
                contact_email: {
                    type: 'text',
                    selector: 'h6'
                },
                contact_phone: {
                    type: 'text',
                    selector: 'h6'
                },
                haveButton: {
                    type: 'boolean',
                    default: 'true'
                },
                buttonText: {
                    type: 'text',
                    selector: 'a',
                    default: i18n.__('Call to Action', 'ccc_blocks'),
                },
                buttonURL: {
                    type: 'url',
                    /*source: 'attribute',
                    selector: 'a',
                    attribute: 'href'*/
                }
            },
            save: function (props) {
                var attributes = props.attributes;
                return (
                    el('div', {
                            className: "side_bar_block row " + props.className,
                            style: {backgroundColor: "#f2f5f6"}
                        },
                        el('div', {
                                className: 'vc_col-xs-6 vc_col-sm-12 vc_col-md-12',
                                style: {minWidth: "180px"}
                            },
                            el('h3', {},
                                attributes.title),
                            el(RichText.Content, {
                                tagName: 'h6',
                                value: attributes.text,
                                className: "block_content"
                            })
                        ),
                        el('div', {
                                className: 'vc_col-xs-6 vc_col-sm-12 vc_col-md-12',
                                style: {minWidth: "180px"}
                            },
                            el('h6', {
                                style: {display: (attributes.haveContactInfo) ? "" : "none"},
                                className: "block_cname"
                            }, attributes.contact_name),
                            el('h6', {
                                style: {display: (attributes.haveContactInfo) ? "" : "none"},
                                className: "block_crole"
                            }, attributes.contact_role),
                            el("h6", {
                                    style: {
                                        marginBottom: '10px',
                                        display: (attributes.haveContactInfo && attributes.contact_email !== undefined) ? "" : "none"
                                    }, className: "block_cemail"
                                },
                                el("a", {href: "mailto:" + attributes.contact_email},
                                    el("div", {
                                        className: "email-green",
                                        style: {width: "15px", height: "15px"}
                                    }),
                                    " " + attributes.contact_email)
                            ),
                            el("h6", {
                                    style: {
                                        marginBottom: '10px',
                                        display: (attributes.haveContactInfo && attributes.contact_phone !== undefined) ? "" : "none"
                                    }, className: "block_cphone"
                                },
                                el("div", {
                                    className: "phone-green",
                                    style: {width: "15px", height: "15px"}
                                }),
                                " " + attributes.contact_phone
                            ),
                            el("div", {
                                    className: 'vc_btn3-container vc_btn3-left',
                                    style: {display: (attributes.haveButton) ? "inherith" : "none"}
                                },
                                el('a', {
                                    className: 'round_white_button',
                                    href: attributes.buttonURL
                                }, attributes.buttonText)
                            )
                        )
                    )
                );
            }
        }, {
            attributes: {
                title: {
                    type: 'text',
                    selector: 'h4'
                },
                text: {
                    type: 'text',
                    selector: 'h5'
                },
                haveContactInfo: {
                    type: 'boolean',
                    default: 'true'
                },
                contact_name: {
                    type: 'text',
                    selector: 'h6'
                },
                contact_role: {
                    type: 'text',
                    selector: 'h6'
                },
                contact_email: {
                    type: 'text',
                    selector: 'h6'
                },
                contact_phone: {
                    type: 'text',
                    selector: 'h6'
                },
                haveButton: {
                    type: 'boolean',
                    default: 'true'
                },
                buttonText: {
                    type: 'text',
                    selector: 'a',
                    default: i18n.__('Call to Action', 'ccc_blocks'),
                },
                buttonURL: {
                    type: 'url',
                    /*source: 'attribute',
                    selector: 'a',
                    attribute: 'href'*/
                }
            },
            save: function (props) {
                var attributes = props.attributes;
                return (
                    el('div', {
                            className: "side_bar_block row " + props.className
                        },
                        el('div', {
                                className: 'vc_col-xs-12 vc_col-sm-6 vc_col-md-12'
                            },
                            el('h3', {},
                                attributes.title),
                            el(RichText.Content, {
                                tagName: 'h6',
                                value: attributes.text,
                                className: "block_content",
                                style: {display: (attributes.text !== undefined && attributes.text !== "") ? "" : "none"}
                            })
                        ),
                        el('div', {
                                className: 'vc_col-xs-12 vc_col-sm-6 vc_col-md-12'
                            },
                            el('h6', {
                                style: {display: (attributes.haveContactInfo) ? "" : "none"},
                                className: "block_cname"
                            }, attributes.contact_name),
                            el('h6', {
                                style: {display: (attributes.haveContactInfo) ? "" : "none"},
                                className: "block_crole"
                            }, attributes.contact_role),
                            el("h6", {
                                    style: {display: (attributes.haveContactInfo && attributes.contact_email !== undefined && attributes.contact_email !== "") ? "" : "none"},
                                    className: "block_cemail"
                                },
                                el("a", {href: "mailto:" + attributes.contact_email},
                                    el("div", {className: "email-green"}),
                                    attributes.contact_email)
                            ),
                            el("h6", {
                                    style: {display: (attributes.haveContactInfo && attributes.contact_phone !== undefined && attributes.contact_phone !== "") ? "" : "none"},
                                    className: "block_cphone"
                                },
                                el("div", {className: "phone-green"}),
                                attributes.contact_phone
                            ),
                            el("div", {
                                    className: 'vc_btn3-container vc_btn3-left',
                                    style: {display: (attributes.haveButton) ? "inherith" : "none"}
                                },
                                el('a', {
                                    className: 'round_white_button',
                                    href: attributes.buttonURL
                                }, attributes.buttonText)
                            )
                        )
                    )
                );
            }
        }],
        edit: function (props) {
            var attributes = props.attributes;
            return [
                el(InspectorControls, {key: 'inspector'},
                    el(components.PanelBody, {
                            title: i18n.__('Block Content', 'ccc_blocks'),
                            className: 'block-content',
                            initialOpen: true
                        },
                        el('p', {}, i18n.__('Add custom meta options to your block', 'ccc_blocks')),
                        el(CheckControl, {
                            label: i18n.__('Have Action Button', 'ccc_blocks'),
                            checked: attributes.haveButton,
                            onChange: function (cheched) {
                                props.setAttributes({haveButton: cheched});
                            }
                        }),
                        el(CheckControl, {
                            label: i18n.__('Have Contact Info', 'ccc_blocks'),
                            checked: attributes.haveContactInfo,
                            onChange: function (cheched) {
                                props.setAttributes({haveContactInfo: cheched});
                            }
                        }),
                        el(URLInput, {
                            key: 'editable',
                            value: attributes.buttonURL,
                            className: "uri_input",
                            style: {display: (attributes.haveButton) ? "inherit" : "none"},
                            onChange: function (newButtonUrl) {
                                props.setAttributes({buttonURL: newButtonUrl});
                            }
                        })
                    )
                ),
                el('div', {
                        className: props.className,
                    },
                    el(PlainText, {
                        key: 'editable',
                        tagName: 'h4',
                        placeholder: i18n.__('Write Title', 'ccc_blocks'),
                        keepPlaceholderOnFocus: true,
                        value: attributes.title,
                        onChange: function (newTitle) {
                            props.setAttributes({title: newTitle});
                        }
                    }),
                    el(RichText, {
                        key: 'editable',
                        tagName: 'h5',
                        style: {marginBottom: '10px', fontWeight: '400'},
                        placeholder: i18n.__('Write Text Content', 'ccc_blocks'),
                        keepPlaceholderOnFocus: true,
                        value: attributes.text,
                        onChange: function (newText) {
                            props.setAttributes({text: newText});
                        }
                    }),
                    el(PlainText, {
                        key: 'editable',
                        tagName: 'h6',
                        style: {
                            marginBottom: '10px',
                            fontWeight: '600',
                            display: (attributes.haveContactInfo) ? "" : "none"
                        },
                        placeholder: i18n.__('Contact Name', 'ccc_blocks'),
                        keepPlaceholderOnFocus: true,
                        value: attributes.contact_name,
                        onChange: function (newText) {
                            props.setAttributes({contact_name: newText});
                        }
                    }), el(PlainText, {
                        key: 'editable',
                        tagName: 'h6',
                        style: {marginBottom: '10px', display: (attributes.haveContactInfo) ? "" : "none"},
                        placeholder: i18n.__('Contact Role', 'ccc_blocks'),
                        keepPlaceholderOnFocus: true,
                        value: attributes.contact_role,
                        onChange: function (newText) {
                            props.setAttributes({contact_role: newText});
                        }
                    }), el(PlainText, {
                        key: 'editable',
                        tagName: 'h6',
                        style: {marginBottom: '10px', display: (attributes.haveContactInfo) ? "" : "none"},
                        placeholder: i18n.__('Contact Email', 'ccc_blocks'),
                        keepPlaceholderOnFocus: true,
                        value: attributes.contact_email,
                        onChange: function (newText) {
                            props.setAttributes({contact_email: newText});
                        }
                    }), el(PlainText, {
                        key: 'editable',
                        tagName: 'h6',
                        style: {marginBottom: '10px', display: (attributes.haveContactInfo) ? "" : "none"},
                        placeholder: i18n.__('Contact Phone', 'ccc_blocks'),
                        keepPlaceholderOnFocus: true,
                        value: attributes.contact_phone,
                        onChange: function (newText) {
                            props.setAttributes({contact_phone: newText});
                        }
                    }),
                    el(TextControl, {
                        type: 'text',
                        value: attributes.buttonText,
                        style: {display: (attributes.haveButton) ? "" : "none !important"},
                        className: 'round_white_button',
                        onChange: function (newButtonText) {
                            props.setAttributes({buttonText: newButtonText});
                        }
                    })
                )
            ];
        },
        save: function (props) {
            var attributes = props.attributes;
            return (
                el('div', {
                        className: "side_bar_block row " + props.className
                    },
                    el('div', {
                            className: 'vc_col-xs-12 vc_col-sm-6 vc_col-md-12'
                        },
                        el('h3', {},
                            attributes.title),
                        el(RichText.Content, {
                            tagName: 'h6',
                            value: attributes.text,
                            className: "block_content",
                            style: {display: (attributes.text !== undefined && attributes.text !== "") ? "block" : "none"}
                        })
                    ),
                    el('div', {
                            className: 'vc_col-xs-12 vc_col-sm-6 vc_col-md-12'
                        },
                        el("div", {className: "contact_block"},
                            el('h6', {
                                style: {display: (attributes.haveContactInfo) ? "block" : "none"},
                                className: "block_cname"
                            }, attributes.contact_name),
                            el('h6', {
                                style: {display: (attributes.haveContactInfo) ? "block" : "none"},
                                className: "block_crole"
                            }, attributes.contact_role),
                            el("h6", {
                                    style: {display: (attributes.haveContactInfo && attributes.contact_email !== undefined && attributes.contact_email !== "") ? "block" : "none"},
                                    className: "block_cemail"
                                },
                                el("a", {href: "mailto:" + attributes.contact_email},
                                    el("div", {className: "email-green"}),
                                    attributes.contact_email)
                            ),
                            el("h6", {
                                    style: {display: (attributes.haveContactInfo && attributes.contact_phone !== undefined && attributes.contact_phone !== "") ? "block" : "none"},
                                    className: "block_cphone"
                                },
                                el("div", {className: "phone-green"}),
                                attributes.contact_phone
                            )),
                        el("div", {style: {display: (attributes.haveButton) ? "inherith" : "none"}},
                            el('a', {
                                className: 'round_white_button',
                                href: attributes.buttonURL
                            }, attributes.buttonText)
                        )
                    )
                )
            );
        }
    });
})(
    window.wp.blocks,
    window.wp.editor,
    window.wp.components,
    window.wp.i18n,
    window.wp.element
);