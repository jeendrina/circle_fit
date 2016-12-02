
<h1>ACTIVITY</h1>

<?php if (isset($_SESSION['user_id'])) { ?>
<button><a href="index.php?module=activity&page=add-edit">Book a class</a></button>
<?php }else { ?>
<p><a href="index.php?module=activity&page=add-edit">Select an activity</a></p>
<p><a href="index.php?module=booking&page=add-edit">Book a time</a></p>
<?php }  ?>

<div class="row">
  <div class="col-md-4 col-sm-12">
      <img src="http://placehold.it/350x150">
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
      <button class="btn btn-primary">click me</button> 
  </div>
  <div class="col-md-4 col-sm-12">
      <img src="http://placehold.it/350x150">
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
      <button class="btn btn-danger btn-block">click me</button> 
  </div>
    <div class="col-md-4 col-sm-12">
      <img src="http://placehold.it/350x150">
      <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>
     <button>click me</button> 
    </div>

</div>


