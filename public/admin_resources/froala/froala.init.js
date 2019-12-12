$(function() {
  var token = $('input[name="_token"]').val();

  $('.editor').editable({
    theme: 'custom',
    // buttons: ['bold', 'insertOrderedList', 'insertUnorderedList'],
    inlineMode: false,
    minHeight: 250,
    imageUploadURL: "/admin/post/froala/upload-image",
    imageDeleteURL: "/admin/post/froala/delete-image",
    imagesLoadURL: "/admin/post/froala/load-images",
    // imageUploadURL: "{{ action('PostController@froalaUploadImage') }}",
    // imageDeleteURL: "{{ action('PostController@froalaDeleteImage') }}",
    // imagesLoadURL: "{{ action('PostController@froalaLoadImages') }}",

    imageUploadParams: {'_token': token},
    imageDeleteParams: {'_token': token},
  })
  .on('editable.imageError', function (e, editor, error) {
    alert(error.message);
  })
  .on('editable.afterRemoveImage', function (e, editor, $img) {
    editor.options.imageDeleteParams = {src: $img.attr('src'), '_token': token};
    editor.deleteImage($img);
  })

});
