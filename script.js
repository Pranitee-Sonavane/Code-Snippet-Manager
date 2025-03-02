
document.addEventListener('DOMContentLoaded', function() {
  // ... existing code

  saveButton.addEventListener('click', function() {
    const name = snippetNameInput.value;
    const code = snippetCodeInput.value;

    if (name && code) {
      // AJAX request to save snippet
      const xhr = new XMLHttpRequest();
      xhr.open('POST', 'saveSnippet.php', true);
      xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
      xhr.onload = function() {
        console.log(xhr.responseText);
      };
      xhr.send('name=' + name + '&code=' + code);

      // ... rest of the code
    }
  });

  // AJAX request to load snippets
  const xhr = new XMLHttpRequest();
  xhr.open('GET', 'getSnippets.php', true);
  xhr.onload = function() {
    snippetList.innerHTML = xhr.responseText;
  };
  xhr.send();

  // ... existing code
});


document.addEventListener('DOMContentLoaded', function() {
  const snippetNameInput = document.getElementById('snippetName');
  const snippetCodeInput = document.getElementById('snippetCode');
  const saveButton = document.getElementById('saveSnippet');
  const snippetList = document.getElementById('snippetList');
  const viewSnippet = document.getElementById('viewSnippet');

  saveButton.addEventListener('click', function() {
    const name = snippetNameInput.value;
    const code = snippetCodeInput.value;

    if (name && code) {
      const li = document.createElement('li');
      li.textContent = name;
      li.dataset.code = code;
      snippetList.appendChild(li);
      snippetNameInput.value = '';
      snippetCodeInput.value = '';
    }
  });

  // Add event listener to view a saved snippet
  snippetList.addEventListener('click', function(event) {
    const target = event.target;
    if (target.tagName === 'LI') {
      const code = target.dataset.code;
      viewSnippet.value = code;
    }
  });
});

