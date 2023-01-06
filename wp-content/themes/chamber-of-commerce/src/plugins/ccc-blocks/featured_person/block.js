(function (blocks, editor, components, i18n, element) {
    var el = element.createElement;
    var registerBlockType = blocks.registerBlockType;
    var PlainText = editor.PlainText;
    var BlockControls = editor.BlockControls;
    var TextControl = components.TextControl;
    var URLInput = editor.URLInput;
    var MediaUpload = editor.MediaUpload;

    registerBlockType('ccc-blocks/featured-person', {
        title: i18n.__('Side-A', 'ccc_blocks'),
        description: i18n.__('A custom block for displaying featured person section', 'ccc_blocks'),
        icon: 'id',
        category: 'ccc_blocks',
        attributes: {
            personImageID: {
                type: 'number'
            },
            personImageURL: {
                type: 'string',
                source: 'attribute',
                selector: 'img',
                attribute: 'src'
            },
            subTitle: {
                type: 'text',
                selector: '.member_subtitle'
            },
            contact_name: {
                type: 'text',
                selector: '.full_name'
            },
            contact_role: {
                type: 'text',
                selector: '.member_role'
            },
            contact_email: {
                type: 'text',
                selector: '.member_email'
            },
            contact_phone: {
                type: 'text',
                selector: '.member_phone'
            }
        },
        edit: function (props) {
            var attributes = props.attributes;
            var onSelectImage = function (media) {
                return props.setAttributes({
                    personImageURL: media.url,
                    personImageID: media.id
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
                    )),
                el('div', {
                        className: "featured_container "+props.className,
                    },
                    el('div', {
                            className: "featured_header",
                        },
                        el(PlainText, {
                            key: 'editable',
                            tagName: 'div',
                            className: "member_role",
                            placeholder: i18n.__('Role', 'ccc_blocks'),
                            keepPlaceholderOnFocus: true,
                            value: attributes.contact_role,
                            onChange: function (newRole) {
                                props.setAttributes({contact_role: newRole});
                            }
                        }),
                        el("div",{id: "img_header"},
                            el(MediaUpload, {
                                onSelect: onSelectImage,
                                type: 'image',
                                value: attributes.personImageID,
                                render: function (obj) {
                                    return el(components.Button, {
                                            className: attributes.personImageID ? 'image-button' : 'button button-large',
                                            onClick: obj.open
                                        },
                                        !attributes.personImageID ? i18n.__('Upload Image', 'my-first-gutenberg-block') : el('img', {src: attributes.personImageURL})
                                    );
                                }
                            })
                        )),
                    el("div",{className: "personal_info"},
                         el(PlainText, {
                             key: 'editable',
                             tagName: 'div',
                             className: "full_name",
                             placeholder: i18n.__('Name', 'ccc_blocks'),
                             keepPlaceholderOnFocus: true,
                             value: attributes.contact_name,
                             onChange: function (newName) {
                                 props.setAttributes({contact_name: newName});
                             }
                         }),
                        el(PlainText, {
                            key: 'editable',
                            tagName: 'div',
                            className: "member_subtitle",
                            placeholder: i18n.__('Title', 'ccc_blocks'),
                            keepPlaceholderOnFocus: true,
                            value: attributes.subTitle,
                            onChange: function (newTitle) {
                                props.setAttributes({subTitle: newTitle});
                            }
                        }),
                        el(PlainText, {
                            key: 'editable',
                            tagName: 'div',
                            className: "member_email",
                            placeholder: i18n.__('Email', 'ccc_blocks'),
                            keepPlaceholderOnFocus: true,
                            value: attributes.contact_email,
                            onChange: function (newEmail) {
                                props.setAttributes({contact_email: newEmail});
                            }
                        }),
                        el(PlainText, {
                            key: 'editable',
                            tagName: 'div',
                            className: "member_phone",
                            placeholder: i18n.__('Phone', 'ccc_blocks'),
                            keepPlaceholderOnFocus: true,
                            value: attributes.contact_phone,
                            onChange: function (newPhone) {
                                props.setAttributes({contact_phone: newPhone});
                            }
                        })
                    )
                )
            ];
        },
        save: function (props) {
            var attributes = props.attributes;
            var image = (attributes.personImageURL !== undefined)? el("img", {  src: attributes.personImageURL,  alt: attributes.contact_name }): null;
            return  (
                el('div', {
                        className: "featured_container "+((props.className!=="" && props.className!==undefined)? props.className : ""),
                    },
                    el('div', {
                                className: "featured_header "+((image!==null)? "" : "no-image")
                            },
                            el("div",{id: "img_header"},
                                image
                            ),
                            el("div", {
                                tagName: 'div',
                                className: "member_role",

                            },attributes.contact_role)
                        ),
                        el("div",{className: "personal_info"},
                            el("div", {
                                className: "full_name",
                            },attributes.contact_name),
                            el("div", {
                                className: "member_subtitle",
                            },attributes.subTitle),
                            el("div", {
                                    className: "member_email", style: {display: ( attributes.contact_email!==undefined &&  attributes.contact_email!=="")?"":"none"}
                                },
                                el("a", {href: "mailto:"+attributes.contact_email},
                                    el("div", { className:"email-green"}),
                                    attributes.contact_email)
                            ),
                            el('div', {
                                    className: "member_phone", style: {display: (attributes.contact_phone!==undefined &&  attributes.contact_phone!=="")?"":"none"}
                                },
                                el("div", { className:"phone-green"}),
                                attributes.contact_phone)
                        )
                    )

            );
        },
        deprecated: [{
            attributes: {
                personImageID: {
                    type: 'number'
                },
                personImageURL: {
                    type: 'string',
                    source: 'attribute',
                    selector: 'img',
                    attribute: 'src'
                },
                subTitle: {
                    type: 'text',
                    selector: '.member_subtitle'
                },
                contact_name: {
                    type: 'text',
                    selector: '.full_name'
                },
                contact_role: {
                    type: 'text',
                    selector: '.member_role'
                },
                contact_email: {
                    type: 'text',
                    selector: '.member_email'
                },
                contact_phone: {
                    type: 'text',
                    selector: '.member_phone'
                }
            },
            save: function (props) {
                var attributes = props.attributes;
                var image = (attributes.personImageURL !== undefined)? el("img", {  src: attributes.personImageURL,  alt: attributes.contact_name }): null;
                return  (
                    el('div', {
                            className: "featured_container "+props.className,
                        },
                        el('div', {
                                className: "featured_header",
                            },
                            el("div",{id: "img_header"},
                                image
                            ),
                            el("div", {
                                tagName: 'div',
                                className: "member_role",

                            },attributes.contact_role)
                        ),
                        el("div",{className: "personal_info"},
                            el("div", {
                                className: "full_name",
                            },attributes.contact_name),
                            el("div", {
                                className: "member_subtitle",
                            },attributes.subTitle),
                            el("div", {
                                    className: "member_email", style: {display: ( attributes.contact_email!==undefined)?"":"none"}
                                },
                                el("a", {href: "mailto:"+attributes.contact_email},
                                    el("div", { className:"email-green",
                                        style:{width: "15px", height: "15px"}}),
                                    " "+attributes.contact_email)
                            ),
                            el('div', {
                                    className: "member_phone", style: {display: (attributes.contact_phone!==undefined)?"":"none"}
                                },
                                el("div", { className:"phone-green",
                                    style:{width: "15px", height: "15px"}}),
                                " "+attributes.contact_phone)
                        )
                    )
                );
            },
        },{
            attributes: {
                personImageID: {
                    type: 'number'
                },
                personImageURL: {
                    type: 'string',
                    source: 'attribute',
                    selector: 'img',
                    attribute: 'src'
                },
                subTitle: {
                    type: 'text',
                    selector: '.member_subtitle'
                },
                contact_name: {
                    type: 'text',
                    selector: '.full_name'
                },
                contact_role: {
                    type: 'text',
                    selector: '.member_role'
                },
                contact_email: {
                    type: 'text',
                    selector: '.member_email'
                },
                contact_phone: {
                    type: 'text',
                    selector: '.member_phone'
                }
            },
            save: function (props) {
                var attributes = props.attributes;
                var image = (attributes.personImageURL !== undefined)? el("img", {  src: attributes.personImageURL,  alt: attributes.contact_name }): null;
                return  (
                    el('div', {
                            className: "featured_container "+props.className,
                        },
                        el('div', {
                                className: "featured_header",
                            },
                            el("div",{id: "img_header"},
                                image
                            ),
                            el("div", {
                                tagName: 'div',
                                className: "member_role",

                            },attributes.contact_role)
                        ),
                        el("div",{className: "personal_info"},
                            el("div", {
                                className: "full_name",
                            },attributes.contact_name),
                            el("div", {
                                className: "member_subtitle",
                            },attributes.subTitle),
                            el("div", {
                                    className: "member_email", style: {display: ( attributes.contact_email!==undefined &&  attributes.contact_email!=="")?"":"none"}
                                },
                                el("a", {href: "mailto:"+attributes.contact_email},
                                    el("div", { className:"email-green"}),
                                    attributes.contact_email)
                            ),
                            el('div', {
                                    className: "member_phone", style: {display: (attributes.contact_phone!==undefined &&  attributes.contact_phone!=="")?"":"none"}
                                },
                                el("div", { className:"phone-green"}),
                                attributes.contact_phone)
                        )
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