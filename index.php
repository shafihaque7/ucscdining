
 <?php require_once 'inc/header.php'; ?>

<script>
		function showSuggestion(str){
			if(str.length == 0){
				document.getElementById('output').innerHTML = '';
			} else {
				// AJAX REQ
				var xmlhttp = new XMLHttpRequest();
				xmlhttp.onreadystatechange = function(){
					if(this.readyState == 4 && this.status == 200){
						document.getElementById('output').innerHTML = this.responseText;
					}
				}
				xmlhttp.open("GET", "suggest.php?q="+str, true);
				xmlhttp.send();
			}
		}
	</script>

                    <h1>Search Food</h1>
	                   <form>
	    	                     Search User: <input type="text" class="form-control" onkeyup="showSuggestion(this.value)">
	                   </form>
	    <p>Suggestions: <span id="output" style="font-weight:bold"></span></p>


       <div class="btn-group btn-group-toggle" data-toggle="buttons">
            <label class="btn btn-primary active">
      <input type="radio" name="options" id="option1" autocomplete="off" checked=""> Active
         </label>
         <label class="btn btn-primary">
            <input type="radio" name="options" id="option2" autocomplete="off"> Radio
         </label>
         <label class="btn btn-primary">
            <input type="radio" name="options" id="option3" autocomplete="off"> Radio
         </label>
</div>
<div id = "Something">
</div>


<script>
$(function(){
   $( "label" ).on( "click", function() {

      var test = $(this).find('input').attr('id');

      var test2 = (test.split("option").pop() - 1);
      $("#Something").html("<h1>"+test2+"</h1>");
   });



});

</script>




 <?php require_once 'inc/footer.php'; ?>
