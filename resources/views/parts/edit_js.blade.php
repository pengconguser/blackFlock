<script src="{{ asset('js/module.js') }}" type="text/javascript">
</script>
<script src="{{ asset('js/hotkeys.js') }}" type="text/javascript">
</script>
<script src="{{ asset('js/uploader.js') }}" type="text/javascript">
</script>
<script src="{{ asset('js/simditor.js') }}" type="text/javascript">
</script>
<script>
    $(document).ready(function(){
        var editor = new Simditor({
            textarea: $('#editor'),

            toolbar:[
            'title', 'bold', 'italic', 'color', '|',
            'ol', 'ul', 'blockquote','code' , '|',
            'link', 'image', 'hr', '|',
            'indent', 'outdent', 'alignment', '|',
            ],
            upload:{
                url: '/api/save/image',
                params: { _token: '{{ csrf_token() }}' },
                fileKey: 'upload_file',
                connectionCount: 3,
                leaveConfirm: '文件上传中，关闭此页面将取消上传。'
            },
        });
    });
</script>
