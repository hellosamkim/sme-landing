(function (blocks, editor, components, i18n, element) {
    var el = element.createElement;
    var registerBlockType = blocks.registerBlockType;
    var RichText = editor.RichText;
    var PlainText = editor.PlainText;
    var InspectorControls = editor.InspectorControls;
    var URLInput = editor.URLInput;
    registerBlockType('ccc-blocks/faq', {
        title: i18n.__('Faq', 'faq-block'),
        description: i18n.__('A custom block for displaying a Frequently Asked Question', 'faq-block'),
        icon: 'id',
        category: 'ccc_blocks',
        parent: 'ccc-blocks/faq-container',
        supports: {
            reusable: false,
            html: false
        },
        attributes: {
            title: {
                type: 'text',
                selector: 'h4'
            },
            answer: {
                type: 'text',
                selector: 'p'
            }
        },
        edit: function (props) {
            var attributes = props.attributes;
            var buttonClick = function (e) {
                jQuery(e.currentTarget).parents(".faq_item").find(".faq_content").toggle("slow");
                jQuery(e.currentTarget).parents(".faq_item").toggleClass("faq_active");
            }
            return [
                el('div', {className: ((props.className === null || props.className === undefined) ? "" : props.className) + " faq_icon faq_item faq_active"},
                    el('div', {className: 'faq_title'},
                        el(PlainText, {
                            key: 'editable',
                            tagName: 'h4',
                            placeholder: i18n.__('FAQ Title', 'faq-block'),
                            keepPlaceholderOnFocus: true,
                            value: attributes.title,
                            onChange: function (newTitle) {
                                props.setAttributes({title: newTitle});
                            }
                        }),
                        el("i", {className: 'faq_btn', onClick: buttonClick})
                    ),
                    el("div", {className: 'faq_content'},
                        el(RichText, {
                            key: 'editable',
                            tagName: 'p',
                            placeholder: i18n.__('FAQ Content', 'faq-block'),
                            keepPlaceholderOnFocus: true,
                            value: attributes.answer,
                            onChange: function (newText) {
                                props.setAttributes({answer: newText});
                            }
                        })
                    )
                )
            ];
        },
        save: function (props) {
            var attributes = props.attributes;
            var className = props.className;

            return (el("div", {className: "vc_col-xs-12"},
                el('div', {className: ((props.className === null || props.className === undefined) ? "" : props.className) + "faq_icon faq_item"},
                    el('div', {className: 'faq_title'},
                        el('h4', {}, attributes.title),
                        el("i", {className: 'faq_btn'})),
                    el("div", {className: 'faq_content', style: {display: "none"}},
                        el(RichText.Content, {tagName: 'p', value: attributes.answer}))
                )));
        }
    });
})(
    window.wp.blocks,
    window.wp.editor,
    window.wp.components,
    window.wp.i18n,
    window.wp.element
);