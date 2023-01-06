
(function (blocks, editor, components, i18n, element) {
    var el = element.createElement;
    var registerBlockType = blocks.registerBlockType;
    var SelectControl = components.SelectControl;
    var BlockControls = editor.BlockControls;
    var MediaUpload = editor.MediaUpload;


    registerBlockType('ccc-blocks/cta-f', {
        title: i18n.__('Call to Action F', 'ccc_blocks'),
        description: i18n.__('A custom block for displaying a Call to Action section', 'ccc_blocks'),
        icon: 'id',
        category: 'ccc_blocks',
        parent: 'ccc-blocks/cta-container-type-f',
        supports: {
            reusable: false,
            html: false
        },
        attributes: {
            title: {
                type: 'text',
                source: 'attribute',
                selector: 'a',
                attribute: 'title'
            },
            text: {
                type: 'text',
                selector: '.excerpt',
                source: "html",
            },
            imgURL: {
                type: "string",
                source: 'attribute',
                selector: 'img',
                attribute: 'src'
            },
            imgId: {
                type: "number"
            },
            postURL: {
                type: "url",
                source: 'attribute',
                selector: 'a',
                attribute: 'href'
            }

        },
        edit:  wp.data.withSelect( function( select ) {
                return {
                    posts: wp.data.select("core").getEntityRecords("postType","page",{per_page:-1})
                };
            })( function( props ) {

                var attributes = props.attributes;
                var onSelectImage = function (media) {
                    return props.setAttributes({
                        imgURL: media.url,
                        imgId:  media.id
                    });
                };
                if ( ! props.posts ) {
                    return el('div', {
                            className: props.className,
                            style: { textAlign: 'left' }
                        },
                        el(SelectControl, {
                            placeholder: i18n.__('Loading...', 'ccc_blocks'),
                            keepPlaceholderOnFocus: true,
                            options: [{label:"Loading....", value: -1}]
                        })
                    );
                }

                var options = [];
                for(i=0; i<props.posts.length; i++)
                {
                    options.push({label:props.posts[i].title.raw,
                        value: JSON.stringify({title: props.posts[i].title.raw, text:props.posts[i].excerpt.raw, img:props.posts[i].featured_media, url: props.posts[i].link, id: props.posts[i].id}) });
                }

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
                    )
                ),
                el('div', {
                        className: props.className,
                        style: { textAlign: 'left' }
                    },

                    el(SelectControl, {
                        placeholder: i18n.__("Select Page", 'ccc_blocks'),
                        options: options,
                        keepPlaceholderOnFocus: true,
                        value: options.find(function (option) {
                            var opt=JSON.parse(option.value);
                            return opt.id===attributes.postId;
                        }),
                        onChange:  function (newPost) {
                            newPost = JSON.parse(newPost);

                            props.setAttributes({title: newPost.title});
                            props.setAttributes({text: newPost.text});
                            props.setAttributes({postURL: newPost.url});
                        }
                    }),
                    el('div', {
                            className: 'my-block-image', style: {width: '50%'}
                        },
                        el(MediaUpload, {
                            onSelect: onSelectImage,
                            type: 'image',
                            value: attributes.imgId,
                            render: function (obj) {
                                return el(components.Button, {
                                        className: attributes.imgId ? 'image-button' : 'button button-large',
                                        onClick: obj.open
                                    },
                                    !attributes.imgId ? i18n.__('Upload Image', 'ccc_blocks') : el('img', {src: attributes.imgURL})
                                );
                            }
                        })
                    ),
                    el("a", {
                            className: 'vc_gitem-link element_link',
                            placeholder: i18n.__('Title', 'ccc_blocks'),
                            href: attributes.postURL},
                        attributes.title),
                    el("p", {
                        className: 'excerpt excerpt-white'},
                        attributes.text)
                )
            ];
            } ),
        save: function (props) {
            var attributes = props.attributes;

            return (
                el("div",{className: 'vc_col-xs-12 vc_col-sm-6 vc_col-md-4'},
                    el('div', {
                            className: 'home_content_box content-box',
                            style: {height: "100%"}
                        },
                        el('div', {
                                className: 'full_listing_content',
                                style: {padding: "15px"}
                            },
                            el("div", {style:{marginBottom: "10px"} },
                                el("img",{width: "100%", height: "250px",
                                    className:"service_img",
                                    src: attributes.imgURL})
                            ),
                            el("h5",{style: {textAlign: "left"}},
                                el("a",{className: 'vc_gitem-link small_element_link',
                                        style: {width: "15px", height: "15px",},
                                        href: attributes.postURL,
                                        title: attributes.title},
                                    attributes.title,
                                    el("div",{className: 'arrow_in_link'})
                                )
                            ),
                            el("div",{className: "excerpt excerpt-white"},
                                attributes.text)
                        )
                    ))
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