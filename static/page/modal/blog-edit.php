<div class="w3-modal-content w3-card-4 w3-animate-top w3-round" style="width:90%">
	<div class="w3-container w3-light-grey w3-round">
		<span ng-click="closeModal()" class="w3-button w3-display-topright w3-xlarge w3-round">
			&times;
		</span>
		<h1>
			Edit post	
		</h1>
		<form id="newPost" class="w3-container w3-center" method="post" action="static/php/addPost.php">
			<input name="title" ng-bind="edit.title" class="w3-input w3-margin-bottom" placeholder="Title" />
			<textarea name="content" cols="200" rows="40" style="width:100%;height:60%"></textarea>   
        </form>
      <div id="editor">
	</div> 
        
    </div>
    
    <div class="w3-container w3-border-top w3-grey w3-round">
            <p class="w3-button w3-red w3-text-white w3-right w3-margin" ng-click="closeModal()">
                Cancel
            </p>
            <input form="newPost" type="submit" value="Post" class="w3-button w3-green w3-text-white w3-right w3-margin">
	    </div>
	<script>
  var quill = new Quill('#editor', {
    theme: 'snow'
  });
</script>	
</div>
