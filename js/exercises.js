// Function to fetch articles
function loadExercises() {
  fetch('assets/test_exercises.json')
    .then(response => response.json())
    .then(exercises => renderExercises(exercises))
    .catch(error => console.error("Failed to load exercises:", error));
}

// Function to render articles
function renderExercises(exercises) {
  const listElement = document.querySelector('.exercise-list');
  exercises.forEach(exercise => {
    const exerciseElement = document.createElement('div');
    exerciseElement.className = 'exercise';
    exerciseElement.innerHTML = `
            <img src="${exercise.imageUrl}" alt="${exercise.title}">
            <div class="exercise-content">
                <h2 class="exercise-title">${exercise.title}</h2>
                <p class="exercise-summary">${exercise.summary}</p>
            </div>
        `;
    listElement.appendChild(exerciseElement);
  });
}

document.addEventListener('DOMContentLoaded', loadExercises);
