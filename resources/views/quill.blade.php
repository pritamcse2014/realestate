<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Quill Rich Text Editor</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" />
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.snow.css" />
    </head>
    <body>
        <div class="container">
            <div class="card mt-5">
                <h3 class="card-header p-3">Quill Rich Text Editor</h3>
                @include('_message')
                <div class="card-body">
                    <form action="{{ url('quillEditor') }}" method="post">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label" for="">Title</label>
                            <input class="form-control" type="text" name="title" id="" placeholder="Title" />
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="">Body (Quill Rich Text Editor)</label>
                            <div id="quill-editor" class="mb-3" style="height: 300px;"></div>
                            <textarea class="mb-3 d-none" name="quill_rich" id="quill-editor-area" rows="3"></textarea>
                        </div>
                        <div class="mb-3">
                            <button class="btn btn-success btn-submit" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/quill@2.0.2/dist/quill.js"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function () {
            if (document.getElementById("quill-editor-area")) {
                var editor = new Quill("#quill-editor", {
                    theme: "snow",
                });

                var quillEditor = document.getElementById("quill-editor-area");
                editor.on("text-change", function () {
                    quillEditor.value = editor.root.innerHTML;
                });

                quillEditor.addEventListener("input", function () {
                    editor.root.innerHTML = quillEditor.value;
                });
            }
        });
    </script>
</html>