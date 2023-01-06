(function (blocks, editor, i18n, element) {
    var el = element.createElement;
    var registerBlockType = blocks.registerBlockType;
    var InnerBlocks=editor.InnerBlocks;

    registerBlockType('ccc-blocks/sidebar-block', {
        title: i18n.__('Side Bar', 'ccc_blocks'),
        description: i18n.__('A custom block for displaying layout with right sidebar', 'ccc_blocks'),
        icon: 'id',
        category: 'ccc_blocks',
        attributes: [],
        supports: {
            align: ['wide', 'full'],
            html: false
        },
        edit: function (props) {
            var className = props.className;
            var clientId = props.clientId;
            var innerBlocks = wp.data.select('core/editor').getBlocksByClientId(clientId)[0].innerBlocks;
            if(innerBlocks.length>0){
                wp.data.dispatch('core/editor').updateBlockAttributes(innerBlocks[0].clientId, {className: 'vc_col-xs-12 vc_col-sm-12 vc_col-md-8'});
                wp.data.dispatch('core/editor').updateBlockAttributes(innerBlocks[1].clientId, {className: 'vc_col-xs-12 vc_col-sm-12 vc_col-md-4 sidebar-right'});
            }
            return [ el("div", { className: "vc_row row sidebar"},
                          el(InnerBlocks,{
                              template: [['core/column'],['core/column',{},[['ccc-blocks/featured-person',{}],['ccc-blocks/question-block',{}],['ccc-blocks/links-block',{}]]]],
                              templateLock: "insert",
                          })
            )];

        },
        save: function (props) {
            var attributes = props.attributes;
            var columns = 2;
            return ( el("div", { className: "right_container"},
                el("div",{className: "vc_row row post_content"},
                    el(InnerBlocks.Content))));
        },
        deprecated:[{
            save: function (props) {
                var attributes = props.attributes;
                var columns = 2;
                return ( el("div", { className: "vc_row row"},
                    el(InnerBlocks.Content)));
            }
            },
            {save: function (props) {
                    var attributes = props.attributes;
                    var columns = 2;
                    return ( el("div", { className: "vc_row row right_container"},
                        el("div",{className: "vc_row row post_content"},
                            el(InnerBlocks.Content))));
                }}]
    });
})(
    window.wp.blocks,
    window.wp.editor,
    window.wp.i18n,
    window.wp.element

);


