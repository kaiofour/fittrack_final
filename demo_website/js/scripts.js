function openModal(mealPlan) {
    const modal = document.getElementById("modal");
    const modalImage = document.getElementById("modal-image");
    const modalTitle = document.getElementById("modal-title");
    const modalDescription = document.getElementById("modal-description");
    const modalSchedule = document.getElementById("modal-schedule");


    // Data for meal plans
    const mealPlans = {
        mediterranean: {
            image: '../img/1.png',
            title: 'Mediterranean Diet',
            description: 'The Mediterranean diet is renowned for its health benefits, emphasizing fresh, whole foods such as fruits, vegetables, whole grains, nuts, seeds, and healthy fats like olive oil. When adapted to Filipino cuisine, this diet incorporates local ingredients like eggplant, bitter melon, squash, milkfish, tilapia, tuna, brown rice, sweet potatoes, and taro, while using local herbs and spices to enhance flavor. This approach maintains the diet core principles while celebrating Filipino culinary heritage, offering a balanced and nutritious eating pattern that improves overall health and well-being.',
            schedule: [
                'Sunday',
                'Breakfast: Taho (Silken tofu with syrup and sago pearls)',
                'Lunch: Ensaladang Talong (Grilled eggplant salad) with Pandesal',
                'Dinner: Sinigang na Bangus (Milkfish in sour broth) with brown rice',

                'Monday',
                'Breakfast: Pandesal with kesong puti (white cheese) and tomatoes',
                'Lunch: Ginisang Ampalaya (Sauteed bitter melon) with brown rice',
                'Dinner: Grilled Tuna Belly with ensaladang mangga (green mango salad)',

                'Tuesday',
                'Breakfast: Champorado (Chocolate rice porridge) with tuyo (dried fish)',
                'Lunch: Laing (Taro leaves in coconut milk) with brown rice',
                'Dinner: Pinakbet (Mixed vegetables with shrimp paste) with grilled tilapia',

                'Wednesday',
                'Breakfast: Manggang Hilaw (Green mango) with bagoong (shrimp paste)',
                'Lunch: Kinilaw na Tanigue (Fish ceviche) with brown rice',
                'Dinner: Chicken Adobo with kangkong (water spinach) and brown rice',

                'Thursday',
                'Breakfast: Lugaw (Rice porridge) with boiled egg and tokwat baboy (tofu and pork)',
                'Lunch: Inihaw na Pusit (Grilled squid) with ensaladang lato (seaweed salad)',
                'Dinner: Binagoongan Baboy (Pork in shrimp paste) with brown rice',

                'Friday',
                'Breakfast: Fresh fruits (mango, banana, papaya) with Greek yogurt',
                'Lunch: Sinampalukang Manok (Chicken in tamarind soup) with brown rice',
                'Dinner: Ginataang Kalabasa at Sitaw (Squash and string beans in coconut milk) with grilled fish',

                'Saturday',
                'Breakfast: Pan de Coco (Coconut-filled bread) with coffee',
                'Lunch: Ensaladang Talbos ng Kamote (Sweet potato leaves salad) with grilled chicken',
                'Dinner: Inihaw na Baboy (Grilled pork) with atchara (pickled papaya)'
            ]
        },
        keto: {
            image: '../img/5.png',
            title: 'Keto Diet',
            description: 'The ketogenic diet is a very low-carb, high-fat eating plan. Adapted to Filipino cuisine, it features local foods like pork belly, longganisa, and bangus while minimizing carbs and emphasizing healthy fats. This approach helps in achieving ketosis, aiding weight loss and improved energy levels.',
            schedule: [
                'Sunday',
                    'Breakfast: Tocino (Sweet cured pork) with scrambled eggs',
                    'Lunch: Bicol Express (Pork in spicy coconut milk) with cauliflower rice',
                    'Dinner: Adobong Manok (Chicken Adobo) with sautéed green beans',

                'Monday',
                    'Breakfast: Longganisa (Filipino sausage) with avocado',
                    'Lunch: Kare-Kare (Peanut stew) with oxtail and green vegetables, without rice',
                    'Dinner: Lechon Kawali (Crispy pork belly) with a side of steamed broccoli',

                'Tuesday',
                    'Breakfast: Daing na Bangus (Marinated milkfish) with salted egg and tomatoes',
                    'Lunch: Sinigang na Baboy (Pork in sour broth) with zucchini noodles',
                    'Dinner: Pork Sisig with cauliflower rice',

                'Wednesday',
                    'Breakfast: Tinapa (Smoked fish) with scrambled eggs and cucumber slices',
                    'Lunch: Ginataang Hipon (Shrimp in coconut milk) with sautéed spinach',
                    'Dinner: Beef Tapa with a side of grilled asparagus',

                'Thursday',
                    'Breakfast: Fried eggs with beef tapa and avocado',
                    'Lunch: Sinampalukang Manok (Chicken in tamarind broth) with zucchini noodles',
                    'Dinner: Pork Binagoongan (Pork in shrimp paste) with eggplant',

                'Friday',
                    'Breakfast: Scrambled eggs with tomatoes and kesong puti',
                    'Lunch: Chicken Inasal (Grilled chicken) with a side salad',
                    'Dinner: Pork barbecue with grilled vegetables',

                'Saturday',
                    'Breakfast: Omelette with longganisa and tomatoes.',
                    'Lunch: Tinolang Manok (Chicken soup with papaya and chili leaves) without rice',
                    'Dinner: Grilled tuna belly with a side of green beans'
                // Add more schedule items here
            ]
        },
        dash: {
            image: '../img/3.png',
            title: 'DASH Diet',
            description: 'The DASH diet, designed to prevent and control hypertension, emphasizes fruits, vegetables, whole grains, and lean proteins. Adapted to Filipino cuisine, it includes dishes like sinigang, tinola, and grilled fish, promoting heart health and balanced nutrition.',
            schedule: [
                'Sunday',
                    'Breakfast: Fresh fruit smoothie with banana, mango, and spinach',
                    'Lunch: Chicken Tinola with papaya and malunggay leaves, served with brown rice',
                    'Dinner: Fish Sinigang with assorted vegetables and brown rice',

                'Monday',
                    'Breakfast: Oatmeal with fresh fruits and a sprinkle of nuts',
                    'Lunch: Ensaladang Talbos ng Kamote with grilled chicken breast',
                    'Dinner: Pinakbet with grilled tilapia',

                'Tuesday',
                    'Breakfast: Pandesal with peanut butter and banana',
                    'Lunch: Monggo Guisado (Mung bean stew) with brown rice',
                    'Dinner: Chicken Adobo with steamed broccoli and brown rice',

                'Wednesday',
                    'Breakfast: Fresh fruit salad with low-fat yogurt',
                    'Lunch: Inihaw na Pusit with ensaladang lato',
                    'Dinner: Beef Nilaga (Boiled beef shank with vegetables) with brown rice',

                'Thursday',
                    'Breakfast: Scrambled eggs with tomatoes and onions',
                    'Lunch: Ginataang Kalabasa at Sitaw with brown rice',
                    'Dinner: Chicken Afritada with potatoes, carrots, and brown rice',

                'Friday',
                    'Breakfast: Taho with fresh fruits',
                    'Lunch: Ensaladang Talong with grilled fish',
                    'Dinner: Pork Sinigang with assorted vegetables and brown rice',

                'Saturday',
                    'Breakfast: Smoothie bowl with banana, mango, and spinach topped with granola',
                    'Lunch: Laing with brown rice',
                    'Dinner: Chicken Inasal with a side salad'
            ]
        },
        intermittent: {
            image: '../img/4.png',
            title: 'Intermittent Fasting',
            description: 'Intermittent fasting involves cycling between periods of eating and fasting. Combined with Filipino cuisine, it includes nutrient-dense meals like fish, vegetables, and whole grains during eating windows, helping with weight management and metabolic health.',
            schedule: [
                'Sunday',
                    'Breakfast: Skipped (fasting period)',
                    'Lunch: Grilled bangus with ensaladang talong',
                    'Dinner: Chicken Adobo with brown rice and sautéed vegetables',

                'Monday',
                    'Breakfast: Skipped (fasting period)',
                    'Lunch: Tinolang Manok with brown rice',
                    'Dinner: Beef Tapa with a side of green beans',

                'Tuesday',
                    'Breakfast: Skipped (fasting period)',
                    'Lunch: Bicol Express with cauliflower rice',
                    'Dinner: Grilled Pork Belly with atchara',

                'Wednesday',
                    'Breakfast: Skipped (fasting period)',
                    'Lunch: Sinigang na Baboy with assorted vegetables',
                    'Dinner: Inihaw na Pusit with ensaladang lato',

                'Thursday',
                    'Breakfast: Skipped (fasting period)',
                    'Lunch: Chicken Afritada with brown rice',
                    'Dinner: Grilled Tilapia with a side of steamed broccoli',

                'Friday',
                    'Breakfast: Skipped (fasting period)',
                    'Lunch: Monggo Guisado with brown rice',
                    'Dinner: Lechon Kawali with a side of steamed cabbage',

                'Saturday',
                    'Breakfast: Skipped (fasting period)',
                    'Lunch: Ensaladang Talong with grilled chicken',
                    'Dinner: Pork Sisig with cauliflower rice'
            ]
        }
    };

   // Populate modal content with data
   modalImage.src = mealPlans[mealPlan].image;
   modalTitle.textContent = mealPlans[mealPlan].title;
   modalDescription.textContent = mealPlans[mealPlan].description;

   // Clear previous schedule
   modalSchedule.innerHTML = '';

   // Populate schedule list
   mealPlans[mealPlan].schedule.forEach((item, index) => {
       const listItem = document.createElement('li');
       if (index % 4 === 0) { // Day names are at positions 0, 4, 8, ...
           listItem.innerHTML = `<strong>${item}</strong>`;
       } else {
           listItem.textContent = item;
       }
       modalSchedule.appendChild(listItem);
   });

   // Display the modal
   modal.style.display = "block";
}

function closeModal() {
   const modal = document.getElementById("modal");
   modal.style.display = "none";
}

// Close the modal when the user clicks anywhere outside of it
window.onclick = function (event) {
   const modal = document.getElementById("modal");
   if (event.target == modal) {
       modal.style.display = "none";
   }
}