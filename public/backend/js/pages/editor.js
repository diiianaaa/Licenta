//[editor Javascript]




//Add text editor
    $(function () {
    "use strict";

    // Replace the <textarea id="editor1"> with a CKEditor

	CKEDITOR.replace('editor1')
	//bootstrap WYSIHTML5 - text editor
	$('.textarea').wysihtml5();		
	
  });



  $(function () {
    "use strict";

    // Replace the <textarea id="editor2"> with a CKEditor

	CKEDITOR.replace('editor2')
	//bootstrap WYSIHTML5 - text editor
	$('.textarea').wysihtml5();		
	
  });
