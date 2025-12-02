<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RecipeHomeF - A Community for Home Cooks</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>

@include('layouts.header.upload')


<section class="section"> 
     <h2 class="section-title" >Upload A Recipe</h2>
     <div class="upload-form-container">
        <form action="{{ route('form.uploadRecipe') }}" method="POST" enctype="multipart/form-data" class="upload-form">
            @csrf
            <label for="recipe_image" class="upload-image" >
                <img id="upload_image" src="{{ asset('img/plus_icon.png') }}" alt="Upload Image" />
            </label>
            <input type="file" id="recipe_image" accept="image/*" name="recipe_image" class="visually-hidden" required>

            <div class="upload-form-div">
                Recipe Title
                <input type="text" name="title" placeholder="Title" required>
            </div>

            <div class="upload-form-div-ingredient">
                Ingredient
                <input name="ingredientName" class type="text" placeholder="Name...">
                <input name="quantity" class="quantity" type="number" placeholder="Quantity" min="1" max="200">
                $<input name="amount" class="amount" type="number" placeholder="Cost..."min={{ 1.00 }} max={{ 200.00 }} step={{  0.01 }}>
            </div>
            <div>
              
            <button id="upload-button-remove" class="upload-button-remove">
                Remove Last Ingredient
            </button>
            <button id="upload-button-add" class="upload-button-add">
                Add Another Ingredient
            </button>

            </div>

      
            <input type="submit" id="upload-button-submit" value="submit" class="upload-button-submit">

        </form>
        </div>
</section>

@include('layouts.footer.main')


<!-- javascript -->
<script>
@if (session('status'))
    console.log(@json(session('status')));
@endif

document.getElementById('recipe_image').addEventListener('change', function(event) {
    const [file] = event.target.files;
    if (file) {
        document.getElementById('upload_image').src = URL.createObjectURL(file);
    };
});

document.getElementById('upload-button-add').addEventListener('click', function(event) {
    event.preventDefault();
    const allIngredientDivs = document.querySelectorAll('.upload-form-div-ingredient');
    const last = allIngredientDivs[allIngredientDivs.length - 1];
    const newIngredientDiv = last.cloneNode(true);
    Array.from(newIngredientDiv.querySelectorAll('input')).forEach(i => { i.value = ''; });
    last.after(newIngredientDiv);
});

document.getElementById('upload-button-remove').addEventListener('click', function(event) {
    event.preventDefault();
    const allIngredientDivs = document.querySelectorAll('.upload-form-div-ingredient');
    if (allIngredientDivs.length > 1) {
        const last = allIngredientDivs[allIngredientDivs.length - 1];
        last.parentNode.removeChild(last);
    } else {
        alert('At least one ingredient is required.');
    }
});

</script>

</body>
</html>