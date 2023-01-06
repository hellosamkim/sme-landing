
(function (blocks, editor, components, i18n, element) {
    var el = element.createElement;
    var registerBlockType = blocks.registerBlockType;
    var PlainText = editor.PlainText;
    var RichText = editor.RichText;
    var BlockControls = editor.BlockControls;
    var MediaUpload = editor.MediaUpload;
    var InspectorControls = editor.InspectorControls;
    var TextControl = components.TextControl;
    var URLInput = editor.URLInput;
    var AlignmentToolbar = editor.AlignmentToolbar;
    registerBlockType('ccc-blocks/cta-b', {
        title: i18n.__('Call to Action B', 'call-to-action-b-block'),
        description: i18n.__('A custom block for displaying a Call to Action section', 'call-to-action-b-block'),
        icon: 'id',
        category: 'ccc_blocks',
        parent: 'ccc-blocks/cta-container-type-b',
        supports: {
            inserter: false,
            reusable: false,
            html: false
        },
        attributes: {
            mediaID: {
                type: 'number'
            },
            mediaURL: {
                type: 'string',
                source: 'attribute',
                selector: 'img',
                attribute: 'src'
            },
            title: {
                type: 'text',
                selector: 'h4'
            },
            text: {
                type: 'text',
                selector: 'div.cta-b-text'
            },
            buttonText: {
                type: 'text',
                default: i18n.__('Call to action', 'call-to-action-b-block')
            },
            buttonURL: {
                type: 'url'
            },
            column_class: {
                type: 'string'
            },
            alignment: {
                type: 'string',
                default: 'left'
            }
        },
        edit: function (props) {
            var attributes = props.attributes;
            var onSelectImage = function (media) {
                return props.setAttributes({
                    mediaURL: media.url,
                    mediaID: media.id
                });
            };
            return [
                el(BlockControls, {key: 'controls'},
                    el('div', {
                            className: 'components-toolbar'
                        },
                        el(MediaUpload, {
                            onSelect: onSelectImage,
                            type: 'image',
                            render: function (obj) {
                                return el(components.Button, {
                                        className: 'components-icon-button components-toolbar__control',
                                        onClick: obj.open
                                    },
                                    el('svg', {className: 'dashicon dashicons-edit', width: '20', height: '20'},
                                        el('path', {d: 'M2.25 1h15.5c.69 0 1.25.56 1.25 1.25v15.5c0 .69-.56 1.25-1.25 1.25H2.25C1.56 19 1 18.44 1 17.75V2.25C1 1.56 1.56 1 2.25 1zM17 17V3H3v14h14zM10 6c0-1.1-.9-2-2-2s-2 .9-2 2 .9 2 2 2 2-.9 2-2zm3 5s0-6 3-6v10c0 .55-.45 1-1 1H5c-.55 0-1-.45-1-1V8c2 0 3 4 3 4s1-3 3-3 3 2 3 2z'})
                                    ));
                            }
                        })
                    ),
                    el(AlignmentToolbar, {
                        value: attributes.alignment,
                        onChange: function(newAlignment) {
                            props.setAttributes({ alignment: newAlignment });
                        }
                    })
                ),
                el(InspectorControls, {key: 'inspector'},
                    el(components.PanelBody, {
                            title: i18n.__('Block Content', 'call-to-action-b-block'),
                            className: 'block-content',
                            initialOpen: true
                        },
                        el('p', {}, i18n.__('Add custom meta options to your block', 'call-to-action-b-block')),
                        el(URLInput, {
                            key: 'editable',
                            className: 'my-block-button',
                            value: attributes.buttonURL,
                            onChange: function (buttonUrl, post) {
                                props.setAttributes({buttonURL: buttonUrl});
                            }
                        })
                    )
                ),
                el('div', {
                        className: props.className,
                        style: { textAlign: 'left' }
                    },
                    el('div', {
                            className: 'my-block-content', style: {display: 'flex', flexWrap: 'wrap'}
                        },
                        el('div', {
                                className: 'my-block-image', style: {width: '34%'}
                            },
                            el(MediaUpload, {
                                onSelect: onSelectImage,
                                type: 'image',
                                value: attributes.mediaID,
                                render: function (obj) {
                                    return el(components.Button, {
                                            className: attributes.mediaID ? 'image-button' : 'button button-large',
                                            onClick: obj.open
                                        },
                                        !attributes.mediaID ? i18n.__('Upload Image', 'my-first-gutenberg-block') : el('img', {src: attributes.mediaURL})
                                    );
                                }
                            })
                        ),
                        el('div', { style: {width: '66%'} },
                            el(PlainText, {
                                key: 'editable',
                                tagName: 'h4',
                                className: 'my-block-title',
                                placeholder: i18n.__('Title Text', 'call-to-action-b-block'),
                                keepPlaceholderOnFocus: true,
                                value: attributes.title,
                                onChange: function (newTitle) {
                                    props.setAttributes({title: newTitle});
                                }
                            }),
                            el(RichText, {
                                key: 'editable',
                                multiline: 'p',
                                inline: false,
                                className: 'my-block-text',
                                placeholder: i18n.__('Text', 'call-to-action-b-block'),
                                keepPlaceholderOnFocus: true,
                                value: attributes.text,
                                style: { textAlign: attributes.alignment },
                                onChange: function (newText) {
                                    props.setAttributes({text: newText});
                                }
                            }),
                            el(TextControl, {
                                type: 'text',
                                className: 'round_white_button',
                                placeholder: i18n.__('Call to action', 'call-to-action-b-block'),
                                value: attributes.buttonText,
                                onChange: function (newButtonText) {
                                    props.setAttributes({ buttonText: newButtonText });
                                }
                            })
                        )
                    )
                )
            ];
        },
        save: function (props) {
            var attributes = props.attributes;
            return (
                el('div', {className: ((attributes.column_class!==undefined)?attributes.column_class:"") + ' img-cta-container'},
                    el('div', {
                            className: 'cta_b_content_box'
                        },[
                        el('div', {
                                className: 'vc_col-xs-12 vc_col-sm-4 vc_col-md-4 cta_img'
                            },
                            el('img', {
                                src: attributes.mediaURL
                            })
                        ),
                        el('div', {className: 'vc_col-xs-12 vc_col-sm-8 vc_col-md-8'},
                            el('div', {
                                className: 'cta_content'
                            },
                            el('h3', {style: { textAlign: attributes.alignment } }, attributes.title),
                            el(RichText.Content, {tagName: 'div', className: 'cta-b-text',value:attributes.text ,style: { textAlign: attributes.alignment }})
                            ),
                            el('div', {
                                className: 'vc_btn3-container vc_btn3-left',
                                style: {textAlign: attributes.alignment }
                            }, el('a', {
                                tagName: 'a',
                                className: 'round_white_button',
                                href: attributes.buttonURL
                            }, attributes.buttonText)))
                        ]
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