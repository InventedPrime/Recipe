<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>RecipeHome</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>

    @include('layouts.header.upload')


    <section class="section section-upload-container">
        <form action="{{ route('form.uploadRecipe') }}" method="POST" enctype="multipart/form-data" class="upload-form">
            @csrf
            <label for="recipe_image" class="upload-image">
                <img id="upload-image" src="{{ asset('img/plus_icon.png') }}" alt="Upload Image" />
            </label>
            <input type="file" id="recipe_image" accept="image/*" name="recipe_image" size="500"
                class="visually-hidden" required>

            <div class="upload-form-div">
                <h1>Recipe Title</h1>
                <input type="text" name="title" placeholder="Title" required>
            </div>

            <div class="upload-form-div">
                <h1>Ingredients</h1>
                <div class="upload-form-div-ingredient">
                    <input name="ingredients[0][name]" type="text" placeholder="Name..." required>
                    <input name="ingredients[0][quantity]" type="number" placeholder="Quantity" min="1"
                        max="200" required>

                    <h1>$</h1><input name="ingredients[0][cost]" type="number"
                        placeholder="Cost per..."min={{ 1.0 }} max={{ 200.0 }} step={{ 0.01 }}
                        required>
                </div>

                <div>

                    <button id="upload-button-remove-ingredient" class="upload-button-remove">
                        Remove Last Ingredient
                    </button>
                    <button id="upload-button-add-ingredient" class="upload-button-add">
                        Add Another Ingredient
                    </button>

                </div>
            </div>


            <div class="upload-form-div">
                <h1>Steps</h1>

                <div class="upload-form-step">
                    <h1 class="step">Step 1</h1>
                    <textarea name="steps[]" id="" placeholder="How to prepare this meal..." required></textarea>
                    <div>
                    </div>
                </div>
                <div>
                    <button id="upload-button-remove-step" class="upload-button-remove">
                        Remove Last Step
                    </button>
                    <button id="upload-button-add-step" class="upload-button-add">
                        Add Another Step
                    </button>
                </div>
            </div>

            <div class="upload-form-div">
                <h1>Total Time To Make</h1>
                <input type="number" name="total_time_to_make" placeholder="Total time in minutes..." required>
            </div>


            <div class="upload-form-div">
                <h1>Category</h1>
                <select class="upload-category" name="category_id" id="category" required>
                    <option value="1">🍔 American</option>
                    <option value="2">🍱 Asian</option>
                    <option value="3">🍝 Italian</option>
                    <option value="4">🌮 Mexican</option>
                    <option value="5">🥙 Mediterranean</option>
                    <option value="6">🥮 Dessert</option>
                    <option value="7">🥐 French</option>
                    <option value="8">🥦 Vegan</option>
                    <option value="9">🦞 Seafood</option>
                    <option value="10">🍳 Breakfast</option>
                </select>
            </div>


            <input type="submit" id="upload-button-submit" value="submit" class="upload-button-submit">

        </form>
    </section>


    @include('layouts.footer.main')


    <!-- javascript -->
    <script>
        document.getElementById('recipe_image').addEventListener('change', function(event) {
            const [file] = event.target.files;
            if (file) {
                // reverse the effects of contain cause of the plus icon
                document.getElementById('upload-image').style.objectFit =
                    'cover';
                document.getElementById('upload-image').src = URL.createObjectURL(file);
            };
        });

        // Ingredient add/remove buttons
        document.getElementById('upload-button-add-ingredient').addEventListener('click', function(event) {
            event.preventDefault();
            const allIngredientDivs = document.querySelectorAll('.upload-form-div-ingredient');
            const last = allIngredientDivs[allIngredientDivs.length - 1];
            const newIngredientDiv = last.cloneNode(true);
            [...newIngredientDiv.querySelectorAll('input')].forEach(i => {
                i.value = '';
                i.setAttribute('name', i.getAttribute('name').replace(/\d+/, allIngredientDivs.length));
            });
            last.after(newIngredientDiv);
        });

        document.getElementById('upload-button-remove-ingredient').addEventListener('click', function(event) {
            event.preventDefault();
            const allIngredientDivs = document.querySelectorAll('.upload-form-div-ingredient');
            if (allIngredientDivs.length > 1) {
                const last = allIngredientDivs[allIngredientDivs.length - 1];
                last.parentNode.removeChild(last);
            } else {
                alert('At least one ingredient is required.');
            }
        });

        // Steps add/remove buttons

        document.getElementById('upload-button-add-step').addEventListener('click', function(event) {
            event.preventDefault();
            const allStepDivs = document.querySelectorAll('.upload-form-step');
            const last = allStepDivs[allStepDivs.length - 1];
            const newStepDiv = last.cloneNode(true);
            const nextStepNumber = allStepDivs.length + 1;
            newStepDiv.querySelector('.step').innerHTML = `Step ${nextStepNumber}`;
            [...newStepDiv.querySelectorAll('textarea')].forEach(i => {
                i.value = '';
            });
            last.after(newStepDiv);
        });

        document.getElementById('upload-button-remove-step').addEventListener('click', function(event) {
            event.preventDefault();

            const allStepDivs = document.querySelectorAll('.upload-form-step');
            const nextStep = allStepDivs.length + 1;
            if (allStepDivs.length > 1) {
                const last = allStepDivs[allStepDivs.length - 1];
                last.parentNode.removeChild(last);
            } else {
                alert('At least one step is required.');
            }
        });
    </script>

</body>

</html>
