
(function (blocks, editor, components, i18n, element) {
    var el = element.createElement;
    var registerBlockType = blocks.registerBlockType;
    var InspectorControls = editor.InspectorControls;
    var URLInput = editor.URLInput;
    var Disabled = components.Disabled;
    var ServerSideRender = editor.ServerSideRender;

    registerBlockType('ccc-blocks/cta-e', {
        title: i18n.__('Call to Action E', 'ccc_blocks'),
        description: i18n.__('A custom block for displaying a Call to Action section', 'ccc_blocks'),
        icon: 'id',
        category: 'ccc_blocks',
        parent: 'ccc-blocks/cta-container-type-e',
        supports: {
            reusable: false,
            html: false
        },
        attributes: {
            postId: {
                type: "number"
            },
            postUrl: {
                type: "string"
            }
        },
        edit:  function( props ) {
                var attributes = props.attributes;
            return [
                    el(InspectorControls, {key: 'inspector'},
                        el(components.PanelBody, {
                                title: i18n.__('Block Content', 'call-to-action-a-block'),
                                className: 'block-content',
                                initialOpen: true
                            },
                            el('p', {}, i18n.__('Add custom meta options to your block', 'call-to-action-a-block')),
                            el(URLInput, {
                                key: 'editable',
                                className: 'my-block-button',
                                value: attributes.postUrl,
                                onChange: function (buttonUrl, post) {
                                    console.log(post);
                                    props.setAttributes({postUrl: buttonUrl, postId: post != null ? post.id : 0});
                                }
                            })
                        )
                    ),
                    el('div', {className: props.className}, el(Disabled, null,
                        el(ServerSideRender, {className: 'server-side-render vc_row', block : 'ccc-blocks/cta-e', attributes: {postId: attributes.postId, postUrl: attributes.postUrl} }) ))];
            },
        save: function (props) {
            return null;
        }
    });
})(
    window.wp.blocks,
    window.wp.editor,
    window.wp.components,
    window.wp.i18n,
    window.wp.element
);