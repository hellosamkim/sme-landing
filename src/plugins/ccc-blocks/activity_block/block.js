function create_list_block(block_name, block_title, block_description, types_list, include_featured) {

    (function (blocks, editor, components, i18n, element) {
        var el = element.createElement;
        var registerBlockType = blocks.registerBlockType;
        var PlainText = editor.PlainText;
        var InspectorControls = editor.InspectorControls;
        var RichText = editor.RichText;
        var SelectControl = components.SelectControl;
        var CheckControl = components.CheckboxControl;
        types_list.unshift({value: "", label: "Select Type to List"});


        registerBlockType(block_name, {
            title: i18n.__(block_title, 'ccc-block'),
            description: i18n.__(block_description, 'ccc-blocks'),
            icon: 'id',
            category: 'ccc_blocks',
            attributes: {
                title: {
                    type: 'text',
                    selector: 'h2'
                },
                description: {
                    type: 'text',
                    selector: 'h6'
                },
                postType: {
                    type: 'string'
                },
                notFeatured: {
                    type: 'bool',
                    default: false
                }
            },
            edit: function (props) {
                var attributes = props.attributes;
                return [
                    el(InspectorControls, {key: 'inspector'},
                        el(components.PanelBody, {
                                title: i18n.__('Block Content', 'ccc-blocks'),
                                className: 'block-content',
                                initialOpen: true
                            },
                            el('p', {}, i18n.__('Add custom meta options to your block', 'ccc-blocks')),
                            el(CheckControl, {
                                style: (include_featured)?{}:{display: "none"},
                                label: i18n.__('Not Featured Section ', 'ccc_blocks'),
                                checked: (include_featured)?attributes.notFeatured:true,
                                onChange: function (cheched) {
                                    props.setAttributes({notFeatured: cheched});
                                }
                            }),
                            el(SelectControl, {
                                label: "Select Type",
                                className: 'my-block-button',
                                value: attributes.postType,
                                onChange: function (value) {
                                    props.setAttributes({postType: value});
                                },
                                options: types_list/*[
                                    {value: "", label: "Select Type to List"},
                                    {value: "events", label: "Events"},
                                    {value: "meeting", label: "Meetings"},
                                    {value: "news", label: "News"},
                                    {value: "publication", label: "Publications"}
                                ]*/

                            })
                        )
                    ),
                    el('div', {
                            className: props.className
                        },
                        el('div', {},
                            el(PlainText, {
                                key: 'editable',
                                tagName: 'h2',
                                className: 'my-block-title',
                                placeholder: i18n.__('Title Text', 'ccc-blocks'),
                                keepPlaceholderOnFocus: true,
                                value: attributes.title,
                                onChange: function (newTitle) {
                                    props.setAttributes({title: newTitle});
                                }
                            }),
                            el(RichText, {
                                key: 'editable',
                                tagName: 'h6',
                                className: 'my-block-title',
                                placeholder: i18n.__('Description Text', 'ccc-blocks'),
                                keepPlaceholderOnFocus: true,
                                value: attributes.description,
                                onChange: function (newDescription) {
                                    props.setAttributes({description: newDescription});
                                }
                            })
                        )
                    )
                ];
            },
            save: function (props) {
                var attributes = props.attributes;
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
}

create_list_block('ccc-blocks/activity-block',
    'Activity Block',
    'A custom block for displaying an Activity Block',
    [{value: "events", label: "Events"},
    {value: "meeting", label: "Meetings"},
    {value: "news", label: "News"},
    {value: "publication", label: "Publications"}],
    true);

create_list_block('ccc-blocks/member-block',
    'Members List',
    'A custom block for displaying a List of Persons Members of',
    [{value: "arbitrator", label: "Arbitrators"},
        {value: "chamber", label: "Chamber Members"},
        {value: "business", label: "Business Members"},
        {value: "association", label: "Association Members"},
        {value: "staff", label: "Staff Members"},
        {value: "business_directory", label: "Business Member Directory"}],
    false);