<?php
$id = intval($_GET['id']);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Spaghetti Bolognese Recipe</title>
    <link rel="stylesheet" href="view.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
    <style>
        /* Chef AI Button */
        .chef-ai-btn {
          position: fixed;
          bottom: 20px;
          right: 20px;
          width: 60px;
          height: 60px;
          background: linear-gradient(45deg, #ff7b2c, #eeff02);
          border: none;
          border-radius: 50%;
          cursor: pointer;
          box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
          transition: all 0.3s ease;
          z-index: 1000;
          display: flex;
          align-items: center;
          justify-content: center;
          font-size: 24px;
          color: #1e1e1e;
          text-decoration: none;
        }

        .chef-ai-btn:hover {
          transform: scale(1.1);
          box-shadow: 0 6px 20px rgba(0, 0, 0, 0.4);
        }

        @media (max-width: 768px) {
          .chef-ai-btn {
            width: 50px;
            height: 50px;
            font-size: 20px;
            bottom: 15px;
            right: 15px;
          }
        }
    </style>
</head>
<body>
    <button class="theme-toggle" id="themeToggle">
        <span>↩️</span> back
    </button>
    
    <div class="container">
        <header class="recipe-header">
            <!-- <img src="https://plus.unsplash.com/premium_photo-1670601440146-3b33dfcd7e17?w=600&auto=format&fit=crop&q=60&ixlib=rb-4.1.0&ixid=M3wxMjA3fDB8MHxzZWFyY2h8OXx8Zm9vZHxlbnwwfHwwfHx8MA%3D%3D" alt="Spaghetti Bolognese" class="recipe-image"> -->
            <h1 class="recipe-title" id="recepi-name">recipe name</h1>
            <p class="recipe-description" id=recepi-description>A classic Italian pasta dish with rich meat sauce, perfect for family dinners or special occasions. This recipe combines ground beef, tomatoes, and aromatic herbs for a comforting meal.</p>
        </header>
        
        <div class="recipe-content">
            <div class="card">
                <h2>Ingredients</h2>
                <ul class="ingredients-list" id="ingredients-list">
                    <!-- Ingredients will be populated by JavaScript -->
                </ul>
            </div>
            <div class="card" ><div class="card" id="image-card"></div></div>
            <div class="card">
               
                <h2>Preparation Steps</h2>
                <ol class="steps-list" id="steps-list">
                    <li class="step-item">Heat olive oil in a large pan over medium heat. Add chopped onion, carrot, and celery, and cook until softened (about 5 minutes).</li>
                    
                </ol>
            </div>
            <div class="card">
                              <h2>Recipe Tutorial</h2>
                    <div class="video-section" style="background-color: #ff7b2c;">
                        
                         <div class="video-container">
                        <iframe width="560" height="315" src="https://www.youtube-nocookie.com/embed/CfchYxh7Q9g?si=pA6HSngv8R0cZvlS" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>
            </div>
        </div>
            </div>
        </div>
        
        
    </div>
    
    <!-- Modal for ingredient details -->
    <div class="modal" id="ingredientModal" >
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="modal-title" id="modalIngredientName"></h3>
                <button class="close-modal" id="closeModal">&times;</button>
            </div>
            <div id="modalContent">
                <!-- Content will be populated by JavaScript -->
            </div>
            <div class="modal-links" id="modalLinks">
                <!-- Links will be populated by JavaScript -->
            </div>
        </div>
    </div>
    
    <footer>
        <p>© 2023 Recipe Collection | All rights reserved</p>
    </footer>

    <script>
        var id_num;
         var recipe_data={};
        // Ingredients data with links
        
            
            // this is the fetching data;


            function getRecipeId() {
            const params = new URLSearchParams(window.location.search);
            console.log(params);
            return params.get('id');
        }
       function loadRecipe() {
          
            var id =23 ;
            id=getRecipeId();
            const container = document.getElementById('recipe-container');
            
            var  recipe_name;
            var recipe_pic;
            var desciption;
            var r_category;
            var step;
            var calories;
           
             id_num= "<?php echo $id; ?>";
             
                var filter_recipi=[];
            fetch(`view.php?id=${id_num}`)
                .then(
                    (response) => {
                        return response.json()})
                .then(recipe => {
                    
                      
                    recipe.forEach((items)=>{
                            if(true){
                                    filter_recipi.push({
                                        name:items.ingredient,
                                        price: "$4.50",
                                        calories: `${items.calories} kcal per 100g`,
                                        buyAt: "Shop 🏪",
                                        links: [
                                            { name: "By from keells 🍋‍🟩", url: "https://www.keellssuper.com/fresh-vegetables",img:'https://is5-ssl.mzstatic.com/image/thumb/Purple122/v4/6c/c5/4b/6cc54bcf-aa0f-627d-4ef1-76dcfd09a74f/AppIcon-0-0-1x_U007emarketing-0-0-0-7-0-0-sRGB-0-0-0-GLES2_U002c0-512MB-85-220-0-0.png/512x512bb.jpg' },
                                            { name: "By from Cargills 🌶️ ", url: "https://cargillsonline.com/Product/Vegetables?IC=MjM=&NC=VmVnZXRhYmxlcw==" ,img:"https://th.bing.com/th/id/R.e001b31822924417e34ee7dde9d69924?rik=VoFpxWyo3uPx%2fA&pid=ImgRaw&r=0" },
                                            { name: "By from  LaankaSathosa 🌽", url: "http://www.lankasathosa.org/prices", img:"https://tse2.mm.bing.net/th/id/OIP.SPAC5z67eHeEBG7GJB9lUAHaEA?cb=ucfimg2ucfimg=1&w=850&h=460&rs=1&pid=ImgDetMain&o=7&rm=3"}
                                        ]
                                        
                                    });
                                    recipe_name=items.r_name;
                                   recipe_pic=items.r_picture;
                                   desciption=items.description;
                                   r_category=items.category;
                                    step=items.cooking_step;
                                    

                           }
        
                        }
                    )
                     recipe_data={
                        All_ingredient : [...filter_recipi],
                        recipes_name: recipe_name,
                        recipe_picture:recipe_pic,
                        recipe_description:desciption,
                        recipe_category:r_category,
                        cooking_step:step

                    }
                 
                    displayRecipe(recipe_data);
                     fetch_relevent_data(id_num);
                    displayRecipe_step(recipe_data.cooking_step);
                    hanlelLink(recipe_data.All_ingredient[0]);
                })
                
        }
        



         function displayRecipe(recipe) {

             const container = document.getElementById('recipe-container');
           

        
               // Populate ingredients list
        const ingredientsList = document.getElementById('ingredients-list');
        
       recipe_data.All_ingredient.forEach((ingredient,index) => {
            const recipeName=document.getElementById('recepi-name');
            recipeName.innerHTML=recipe_data.recipes_name|| "not found";
            const li = document.createElement('li');
            li.className = 'ingredient-item';
            li.textContent = ingredient.name;
            li.setAttribute('data-index', index);
            
            // Create tooltip
            const tooltip = document.createElement('div');
            tooltip.className = 'tooltip';
            tooltip.innerHTML = `
                <h4>${ingredient.name}</h4>
                <p><strong>Price:</strong> ${ingredient.price}</p>
                <p><strong>Calories:</strong> ${ingredient.calories}</p>
                <p><strong>Buy at:</strong> ${ingredient.buyAt}</p>
                <a href="#" class="buy-link" >Buy 🛒➡️</a>
            `;
            
            li.appendChild(tooltip);
            ingredientsList.appendChild(li);
        });
        attachTooltips();
        
       
         }


        loadRecipe();
        



     

        // Tooltip functionality
       // Tooltip functionality
        document.addEventListener('DOMContentLoaded', function() {
        
            const ingredientItems = document.querySelectorAll('.ingredient-item');
            
            
                   
            
                   
            
            function afterlorading(){

                    

            }

            // Handle "More Info" button clicks in tooltips
            
            
            // Theme toggle functionality (for demonstration)
            const themeToggle = document.getElementById('themeToggle');
            themeToggle.addEventListener('click', function() {
                window.open("recipi.php",'_self');
            });
        });



        function attachTooltips() {
                const ingredientItems = document.querySelectorAll('.ingredient-item');
                ingredientItems.forEach(item => {
                     const tooltip = item.querySelector('.tooltip');
                    if (window.innerWidth <= 768) { // typical mobile breakpoint
    // Mobile behavior
                         console.log("Mobile screen detected")
                item.addEventListener('mouseenter', function(e) {
                        tooltip.style.left = 60 + 'px';
                        tooltip.style.top = '10px';
                        tooltip.classList.add('active');
                        tooltip.style.width='240px';
        });

            } else {
    // Desktop behavior
                                console.log("Desktop screen detected");
                item.addEventListener('mouseenter', function(e) {
                        tooltip.style.left = (e.clientX > 400 ? e.clientX-200 : e.clientX-200) + 'px';
                        tooltip.style.top = '10px';
                        tooltip.classList.add('active');
        });
                        }

                       
                        
        item.addEventListener('mouseleave', function() {
            tooltip.classList.remove('active');
        });
    });
}


const hanlelLink=(datapack)=>{
             var modal = document.getElementById('ingredientModal');
            var modalIngredientName = document.getElementById('modalIngredientName');
            var modalContent = document.getElementById('modalContent');
            var modalLinks = document.getElementById('modalLinks');
            var closeModal = document.getElementById('closeModal');
      document.addEventListener('click', function(e) {
                if (e.target.classList.contains('buy-link')) {
                    e.preventDefault();
                    // const index = e.target.getAttribute('data-index');
                    openIngredientModal();
                }
            });
            
            // Open modal with ingredient details
            function openIngredientModal() {
                const ingredient = datapack;
                
                modalIngredientName.textContent ="foods";
                modalContent.innerHTML = `
                    <p><strong>Price:</strong> ${ingredient.price}</p>
                    <p><strong>Calories:</strong> ${ingredient.calories}</p>
                    <p><strong>Buy at:</strong> ${ingredient.buyAt}</p>
                `;
                
                // Populate links
                modalLinks.innerHTML = '';
                ingredient.links.forEach(link => {
                    const linkElement = document.createElement('a');
                    const imageElement=document.createElement('img');
                    linkElement.className='linkToBrand';
                    imageElement.className='icon';
                    imageElement.src=link.img;
                    linkElement.className = 'modal-link';
                    linkElement.href = link.url;
                    linkElement.textContent = link.name;
                    linkElement.appendChild(imageElement);
                    linkElement.target = '_blank';
                    modalLinks.appendChild(linkElement);
                });
                
                modal.style.display = 'flex';
            }
            
            // Close modal
            closeModal.addEventListener('click', function() {
                modal.style.display = 'none';
            });
            
            // Close modal when clicking outside
            window.addEventListener('click', function(e) {
                if (e.target === modal) {
                    modal.style.display = 'none';
                }
            });
}



    </script>
    <script>
        // PDF Generation Function - Capture only main content as one page with BLACK background
function generatePDF() {
    // Initialize PDF
    const { jsPDF } = window.jspdf;
    const doc = new jsPDF('p', 'mm', 'a4');
    
    const recipeName = document.getElementById('recepi-name').textContent;
    
    // Create a temporary container with black background
    const tempContainer = document.createElement('div');
    tempContainer.style.position = 'fixed';
    tempContainer.style.left = '-9999px';
    tempContainer.style.top = '0';
    tempContainer.style.width = '800px';
    tempContainer.style.backgroundColor = '#000000'; // BLACK background
    tempContainer.style.padding = '20px';
    
    // Clone the content area
    const contentArea = document.querySelector('.recipe-content').cloneNode(true);
    
    // Apply black background styles to all elements
    applyBlackBackgroundStyles(contentArea);
    
    tempContainer.appendChild(contentArea);
    document.body.appendChild(tempContainer);
    
    // Use html2canvas to capture the content with black background
    html2canvas(tempContainer, {
        scale: 2, // Higher quality
        useCORS: true,
        allowTaint: true,
        backgroundColor: '#000000', // BLACK background
        width: tempContainer.scrollWidth,
        height: tempContainer.scrollHeight,
        onclone: function(clonedDoc) {
            // Ensure black background is applied in the cloned document
            const clonedContainer = clonedDoc.querySelector('div');
            if (clonedContainer) {
                clonedContainer.style.backgroundColor = '#000000';
            }
        }
    }).then(canvas => {
        const imgData = canvas.toDataURL('image/jpeg', 0.9);
        
        // Calculate dimensions to fit the page while maintaining aspect ratio
        const pageWidth = doc.internal.pageSize.width;
        const pageHeight = doc.internal.pageSize.height;
        const margin = 10;
        
        const contentWidth = pageWidth - (2 * margin);
        const contentHeight = pageHeight - (2 * margin);
        
        // Calculate the aspect ratio of the captured content
        const imgAspectRatio = canvas.width / canvas.height;
        const pageAspectRatio = contentWidth / contentHeight;
        
        let finalWidth, finalHeight;
        
        if (imgAspectRatio > pageAspectRatio) {
            // Image is wider - fit to width
            finalWidth = contentWidth;
            finalHeight = contentWidth / imgAspectRatio;
        } else {
            // Image is taller - fit to height
            finalHeight = contentHeight;
            finalWidth = contentHeight * imgAspectRatio;
        }
        
        // Center the image on the page
        const x = (pageWidth - finalWidth) / 2;
        const y = (pageHeight - finalHeight) / 2;
        
        // Add the entire content area as one image
        doc.addImage(imgData, 'JPEG', x, y, finalWidth, finalHeight);
        
        // Clean up temporary container
        document.body.removeChild(tempContainer);
        
        // Save the PDF
        doc.save(`${recipeName.replace(/\s+/g, '_')}_Recipe_Card_Black.pdf`);
        
    }).catch(error => {
        console.error('Error capturing content:', error);
        // Clean up temporary container even if there's an error
        if (document.body.contains(tempContainer)) {
            document.body.removeChild(tempContainer);
        }
        alert('Error generating PDF. Please try again.');
    });
}

// Function to apply black background styles to all elements
function applyBlackBackgroundStyles(element) {
    // Set black background to the main element
    element.style.backgroundColor = '#000000';
    element.style.color = '#ffffff';
    
    // Apply styles to all child elements
    const allElements = element.getElementsByTagName('*');
    
    for (let el of allElements) {
        // Set background to black or dark colors
        if (el.style.backgroundColor && el.style.backgroundColor !== 'transparent') {
            // Convert existing backgrounds to darker versions
            el.style.backgroundColor = '#121212';
        } else if (el.classList.contains('card')) {
            el.style.backgroundColor = '#121212';
            el.style.border = '1px solid #333333';
        }
        
        // Ensure text is visible on dark background
        if (el.style.color) {
            // Keep original colors but ensure contrast
            const currentColor = el.style.color;
            if (currentColor.includes('var(--text-primary)') || currentColor === 'rgb(245, 245, 245)') {
                el.style.color = '#ffffff';
            } else if (currentColor.includes('var(--text-secondary)') || currentColor === 'rgb(176, 176, 176)') {
                el.style.color = '#cccccc';
            } else if (currentColor.includes('var(--accent)')) {
                el.style.color = '#ff7b2c'; // Keep accent color
            }
        }
        
        // Fix borders for visibility
        if (el.style.borderColor) {
            el.style.borderColor = '#333333';
        }
        
        // Fix box shadows for dark theme
        if (el.style.boxShadow) {
            el.style.boxShadow = el.style.boxShadow.replace(/rgba\([^)]+\)/g, 'rgba(255, 255, 255, 0.1)');
        }
    }
}

// deleting the data 


function deleteData() {
    id=id_num;
    if(!confirm("Are you sure you want to delete this?")) return;

    fetch(`delete.php?id=${id}`, {
        method: "GET"
    })
    .then(res => res.json())
    .then(data => {
        if (data.success) {
            window.open("delete_successORerror.php?id=1",'_self');
        } else {
            window.open("delete_successORerror.php?id=0",'_self');
        }
    });
}





// Update the button creation to use the black background version
function addPDFButtons() {
    // Button for black background PDF
    const blackPdfButton = document.createElement('button');
    blackPdfButton.innerHTML = '📄 Download Black Recipe Card';
    blackPdfButton.style.position = 'fixed';
    blackPdfButton.style.bottom = '80px';
    blackPdfButton.style.left = '20px';
    blackPdfButton.style.background = 'var(--accent)';
    blackPdfButton.style.color = 'var(--dark-bg)';
    blackPdfButton.style.border = 'none';
    blackPdfButton.style.padding = '12px 20px';
    blackPdfButton.style.borderRadius = '50px';
    blackPdfButton.style.cursor = 'pointer';
    blackPdfButton.style.fontWeight = '600';
    blackPdfButton.style.zIndex = '1000';
    blackPdfButton.style.boxShadow = '0 4px 10px rgba(0, 0, 0, 0.3)';
    blackPdfButton.style.transition = 'all 0.3s ease';
    
    blackPdfButton.addEventListener('click', generatePDF);
    
    // Button for alternative black background method
    const altBlackButton = document.createElement('button');
    altBlackButton.innerHTML = 'Delete recipe 🚮';
    altBlackButton.style.position = 'fixed';
    altBlackButton.style.bottom = '20px';
    altBlackButton.style.left = '20px';
    altBlackButton.style.background = '#333333';
    altBlackButton.style.color = '#ffffff';
    altBlackButton.style.border = 'none';
    altBlackButton.style.padding = '12px 20px';
    altBlackButton.style.borderRadius = '50px';
    altBlackButton.style.cursor = 'pointer';
    altBlackButton.style.fontWeight = '600';
    altBlackButton.style.zIndex = '1000';
    altBlackButton.style.boxShadow = '0 4px 10px rgba(0, 0, 0, 0.3)';
    altBlackButton.style.transition = 'all 0.3s ease';
    
    altBlackButton.addEventListener('click',deleteData);
    
    // Add hover effects
    [blackPdfButton ].forEach(button => {
        button.addEventListener('mouseenter', function() {
            this.style.transform = 'translateY(-2px)';
            this.style.boxShadow = '0 6px 15px rgba(0, 0, 0, 0.4)';
        });
        
        button.addEventListener('mouseleave', function() {
            this.style.transform = 'translateY(0)';
            this.style.boxShadow = '0 4px 10px rgba(0, 0, 0, 0.3)';
        });
    });
    
    document.body.appendChild(blackPdfButton);
    document.body.appendChild(altBlackButton);
    
}

// Replace the existing addPDFButtons call with this new one
document.addEventListener('DOMContentLoaded', function() {
    addPDFButtons();
});
    </script>

<script>
    var recipe_data;
    async function fetch_relevent_data(recipe_id) {
                const data=await fetch("get_all_recipi.php");
                const convert_data=await data.json(); 
            recipe_data =await convert_data.filter((item)=>item.recipi_id==recipe_id);
            await displayRecipe_data(...recipe_data);
    }


    const displayRecipe_data=(data)=>{
           const image_card = document.getElementById('image-card'); // div
             image_card.style.backgroundImage = `url(${data.r_picture})`;
             
             image_card.style.backgroundSize = 'cover';   // optional
             image_card.style.backgroundPosition = 'center';
             
    }

   const displayRecipe_step = (steps) => {
   
    const stepList = steps != null? steps.split(',') : ["no steps"];
    
    const container = document.getElementById('steps-list');
    container.innerHTML = ""; // Clear old steps

    stepList.forEach(step => {
        const li = document.createElement('li');
        li.className = "step-item";
        li.textContent = step.trim();
        container.appendChild(li);
    });
};


</script>



    <!-- Chef AI Button -->
    <a href="AiBot.php" class="chef-ai-btn" title="Ask AI Chef">👨‍🍳</a>
</body>
</html>