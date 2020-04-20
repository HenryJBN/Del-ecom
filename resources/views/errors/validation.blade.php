@if (count($errors) > 0)


<div class="alert alert-danger">
  <strong>Whoops!</strong> There were some problems with your input.<br><br>
  <ul>
     @foreach ($errors->all() as $error)
       <li>{{ $error }}</li>
     @endforeach
  </ul>
</div>


<script>

var errorss = <?php echo json_encode($errors->all()); ?>

let mat  =  errorss.toString().split(",").join("<br />");
 console.log( errorss.toString());




    Swal.fire({
  title: '<strong>Oop <u>s</u></strong>',
  icon: 'error',
  html:
  '<pre>' + mat + '</pre>',
  showCloseButton: false,
  showCancelButton: false,
  focusConfirm: false,
  confirmButtonText:'Okay!',

})


</script>
@endif
