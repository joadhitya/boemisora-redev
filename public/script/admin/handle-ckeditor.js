
function MyCustomUploadAdapterPlugin(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = (loader) => {
        return new MyUploadAdapter(loader);
    };
}
const handleCkEditor = async (type, value, target) => {
    const iFrameSrc = '//cdn.iframe.ly/api/iframe';
    const iFrameApiKey = 'b16898bedf18cfcc616578';

    try {
        const editor = await ClassicEditor.create(document.querySelector(`#${target}`), {
            mediaEmbed: {
                previewsInData: true,
                providers: [
                    {
                        name: 'Iframely Boemisora',
                        url: /.+/,
                        html: match => {
                            const url = match[0];
                            const iframeUrl = `${iFrameSrc}?app=1&api_key=${iFrameApiKey}&url=${encodeURIComponent(url)}`;
                            return `
                                <div class="iframely-embed">
                                    <div class="iframely-responsive">
                                        <iframe src="${iframeUrl}" style="width:1000px; height: 1000px;" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
                                    </div>
                                </div>`;
                        }
                    }
                ]
            },
            heading: {
                options: [
                    { model: 'paragraph', title: 'Paragraph', class: 'ck-heading_paragraph' },
                    { model: 'heading1', view: 'h1', title: 'Heading 1', class: 'ck-heading_heading1' },
                    { model: 'heading2', view: 'h2', title: 'Heading 2', class: 'ck-heading_heading2' },
                    { model: 'heading3', view: 'h3', title: 'Heading 3', class: 'ck-heading_heading3' },
                    { model: 'heading4', view: 'h4', title: 'Heading 4', class: 'ck-heading_heading4' },
                    { model: 'heading5', view: 'h5', title: 'Heading 5', class: 'ck-heading_heading5' },
                    { model: 'heading6', view: 'h6', title: 'Heading 6', class: 'ck-heading_heading6' },
                ],
            },
        });

        if (type === 'edit') {
            editor.setData(value);
        } else {
            editor.setData('');
        }

        globalCkEditor = editor;
    } catch (error) {
        console.log(error);
    }
};
const resetCKEditor = () => {
    const editableElement = document.querySelector('.ck-editor__editable');
    if (editableElement && editableElement.ckeditorInstance) {
        editableElement.ckeditorInstance.destroy();
    }
};