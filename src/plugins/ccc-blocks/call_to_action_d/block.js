(function (blocks, editor, components, i18n, element) {
    var el = element.createElement;
    var registerBlockType = blocks.registerBlockType;
    var RichText = editor.RichText;
    var PlainText = editor.PlainText;
    var InspectorControls = editor.InspectorControls;
    var URLInput = editor.URLInput;
    var BlockControls = editor.BlockControls;
    var AlignmentToolbar = editor.AlignmentToolbar;
    registerBlockType('ccc-blocks/cta-d', {
        title: i18n.__('Call to Action D', 'call-to-action-d-block'),
        description: i18n.__('A custom block for displaying a Call to Action section', 'call-to-action-d-block'),
        icon: 'id',
        category: 'ccc_blocks',
        parent: 'ccc-blocks/cta-container-type-d',
        supports: {
            inserter: false,
            reusable: false,
            html: false
        },
        attributes: {
            title: {
                type: 'text',
                selector: 'h5'
            },
            siteURL: {
                type: 'url',
                source: 'attribute',
                selector: 'a',
                attribute: 'href'
            },
            text: {
                type: 'text',
                selector: 'div.cta-d-text'
            },
            column_class: {
                type: 'string'
            },
            alignment: {
                type: 'string',
                default: 'left'
            }
        },
        deprecated: [{
            attributes: {
                title: {
                    type: 'text',
                    selector: 'h5'
                },
                siteURL: {
                    type: 'url',
                    source: 'attribute',
                    selector: 'a',
                    attribute: 'href'
                },
                text: {
                    type: 'text',
                    selector: 'div.cta-d-text'
                },
                column_class: {
                    type: 'string'
                },
                alignment: {
                    type: 'string',
                    default: 'left'
                }
            },
            save: function (props) {
                var attributes = props.attributes;
                var className = props.className;
                return ( el('div', {className: attributes.column_class },
                        el('div', {className: 'list_post_body home_content_box'},
                            el('div', {
                                    className: 'cta_d_content_box'
                                },[
                                    el('div', {className: 'vc_col-xs-12'},
                                        el('div', {
                                                className: 'wpb_wrapper'
                                            },
                                            el('h5', {style: { textAlign: attributes.alignment }},
                                                el("a",{
                                                        href: attributes.siteURL,
                                                        className: "vc_gitem-link small_element_link",
                                                        title: attributes.title} ,
                                                    attributes.title,
                                                    el("div",{className: "arrow_in_link"})
                                                )),
                                            el(RichText.Content, {tagName: 'div',style: { textAlign: attributes.alignment }, className: 'cta-d-text',value:attributes.text })
                                        )
                                    )]
                            ))
                    )
                );
            }
        }],
        edit: function (props) {
            var attributes = props.attributes;
            return [el(BlockControls, {key: 'controls'},
                el(AlignmentToolbar, {
                    value: attributes.alignment,
                    onChange: function(newAlignment) {
                        props.setAttributes({ alignment: newAlignment });
                    }
                })
            ),
                el(InspectorControls, {key: 'inspector'},
                    el(components.PanelBody, {
                            title: i18n.__('Block Content', 'call-to-action-d-block'),
                            className: 'block-content',
                            initialOpen: true
                        },
                        el('p', {}, i18n.__('Add custom meta options to your block', 'call-to-action-d-block')),
                        el(URLInput, {
                            key: 'editable',
                            className: 'my-block-button',
                            value: attributes.siteURL,
                            onChange: function (siteURL, post) {
                                if(post!==null && post!==undefined)
                                {
                                    props.setAttributes({title: post.title});
                                }
                                props.setAttributes({siteURL: siteURL});
                            }
                        })
                    )
                ),
                el('div', {
                        className: props.className
                    },
                    el('div', {
                            className: 'my-block-content', style: {display: 'flex', flexWrap: 'wrap'}
                        },
                        el('div', { style: {width: '66%'} },
                            el(PlainText, {
                                key: 'editable',
                                tagName: 'h4',
                                className: 'my-block-title',
                                placeholder: i18n.__('Title Text', 'call-to-action-d-block'),
                                keepPlaceholderOnFocus: true,
                                value: attributes.title,
                                onChange: function (newTitle) {
                                    props.setAttributes({title: newTitle});
                                }
                            }),
                            el(RichText, {
                                key: 'editable',
                                multiline: 'p',
                                className: 'cta-d-text',
                                placeholder: i18n.__('Text', 'call-to-action-d-block'),
                                keepPlaceholderOnFocus: true,
                                value: attributes.text,
                                style: { textAlign: attributes.alignment },
                                onChange: function (newText) {
                                    props.setAttributes({text: newText});
                                }
                            })
                        )
                    )
                )
            ];
        },
        save: function (props) {
            var attributes = props.attributes;
            var className = props.className;
            return ( el('div', {className: attributes.column_class },
                        el('div', {className: 'list_post_body home_content_box'},
                            el('div', {
                                        className: 'cta_d_content_box'
                                    },[
                                    el('div', {className: 'vc_col-xs-12'},
                                        el('div', {
                                            className: 'wpb_wrapper'
                                        },
                                        el('h5', {style: { textAlign: attributes.alignment }},
                                            el("a",{
                                                href: attributes.siteURL,
                                                className: "vc_gitem-link element_link",
                                                title: attributes.title} ,
                                            attributes.title,
                                            el("div",{className: "arrow_in_link"})
                                        )),
                                        el(RichText.Content, {tagName: 'div',style: { textAlign: attributes.alignment }, className: 'cta-d-text',value:attributes.text })
                                        )
                                    )]
                            ))
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