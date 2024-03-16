// Function to fetch lessons
function loadLessons() {
  fetch('assets/test_lessons.json')
    .then(response => response.json())
    .then(lessons => renderLessons(lessons))
    .catch(error => console.error("Failed to load lessons:", error));
}

// Function to render lessons
function renderLessons(lessons) {
  const listElement = document.querySelector('.lesson-list');
  lessons.forEach(lesson => {
    const lessonElement = document.createElement('div');
    lessonElement.className = 'lesson';
    lessonElement.innerHTML = `
            <img src="${lesson.imageUrl}" alt="${lesson.title}">
            <div class="lesson-content">
                <h2 class="lesson-title">${lesson.title}</h2>
                <p class="lesson-summary">${lesson.summary}</p>
            </div>
        `;
    listElement.appendChild(lessonElement);
  });
}

document.addEventListener('DOMContentLoaded', loadLessons);
