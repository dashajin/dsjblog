@extends('admin.layouts.app')

@section('content')
    @include('admin.layouts.leftnav')
    <div id="wrapper">
        <div id="page-wrapper">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="page-head-line">Articles <small>>>> create</small></h1>
                    <h1 class="page-subhead-line text-center" style="font-size: 40px;">{{ config('app.admin.motto') }}</h1>
                </div>
            </div>
            @if (session('success'))
                <div class="alert alert-info">
                    <ul>
                        <li>{{ session('success') }}</li>
                    </ul>
                </div>
            @endif
            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
        <div class="row">
            <div class="col-md-12">
                <form role="form" method="post" action="{{ url('/admin/article') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" placeholder="文章标题" id="title" name="title">
                        <label for="desc">Description:</label>
                        <textarea class="form-control" rows="3" placeholder="文章描述" id="desc" name="description"></textarea>
                        <label for="content">Content:</label>
                        <textarea rows="10" id="editor" name="content"></textarea>
                        <label for="cat_id">Category:</label>
                        <select class="form-control" name="cat_id">
                            @foreach($categories as $category)
                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                        <label for="tag">Tag:</label>
                        <select class="js-example-basic-multiple-limit form-control" multiple="multiple" name="tag_id[]">
                            @foreach($tags as $tag)
                                <option value="{{ $tag->id }}">{{ $tag->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-5">
                            <button class="btn btn-primary" type="button" onclick="form.submit();">submit</button>
                            <a href="{{ url()->previous() }}" class="btn btn-danger">返回</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        </div>
    </div>
@endsection

@section('js')
    <script src="/select2/dist/js/select2.js"></script>
    <script src="https://cdn.jsdelivr.net/simplemde/latest/simplemde.min.js"></script>
    <script type="text/javascript">
        // Most options demonstrate the non-default behavior
        var simplemde = new SimpleMDE({
            autofocus: false,
            autosave: {
                enabled: false,
                uniqueId: "editor01",
                delay: 1000,
            },
            blockStyles: {
                bold: "__",
                italic: "_"
            },
            element: document.getElementById("editor"),
            forceSync: true,
            hideIcons: ["guide", "heading"],
            indentWithTabs: false,
            initialValue: "",
            insertTexts: {
                horizontalRule: ["", "\n\n-----\n\n"],
                image: ["![](http://", ")"],
                link: ["[", "](http://)"],
                table: ["", "\n\n| Column 1 | Column 2 | Column 3 |\n| -------- | -------- | -------- |\n| Text     | Text      | Text     |\n\n"],
            },
            lineWrapping: true,
            parsingConfig: {
                allowAtxHeaderWithoutSpace: true,
                strikethrough: false,
                underscoresBreakWords: true,
            },
            placeholder: "文章内容",
            /* previewRender: function(plainText) {
             console.log(plainText)
             return customMarkdownParser(plainText); // Returns HTML from a custom parser
             },
             previewRender: function(plainText, preview) { // Async method
             setTimeout(function(){
             preview.innerHTML = customMarkdownParser(plainText);
             }, 250);

             return "Loading...";
             },*/
            promptURLs: true,
            renderingConfig: {
                singleLineBreaks: false,
                codeSyntaxHighlighting: true,
            },
            shortcuts: {
                drawTable: "Cmd-Alt-T"
            },
            showIcons: ["code", "table"],
            spellChecker: false,
            status: false,
            status: ["autosave", "lines", "words", "cursor"], // Optional usage
            status: ["autosave", "lines", "words", "cursor", {
                className: "keystrokes",
                defaultValue: function(el) {
                    this.keystrokes = 0;
                    el.innerHTML = "0 Keystrokes";
                },
                onUpdate: function(el) {
                    el.innerHTML = ++this.keystrokes + " Keystrokes";
                }
            }], // Another optional usage, with a custom status bar item that counts keystrokes
            styleSelectedText: false,
            tabSize: 4,
            //toolbar: flase,
            //toolbarTips: false,
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $(".js-example-basic-multiple-limit").select2({
                maximumSelectionLength: 5
            });
        });
    </script>
@endsection