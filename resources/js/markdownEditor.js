import Editor from '@toast-ui/editor';
import '@toast-ui/editor/dist/toastui-editor.css';

function EditorMarkdown(querySelector = 'div#editor') {
  const inputEditor = document.querySelector(querySelector);
    console.log(inputEditor)
  let editor = null;

  if (inputEditor) {
    editor = new Editor({
      el: inputEditor,
      height: '20rem',
      initialEditType: 'markdown',
      placeholder: 'Write down your recipe steps!',
    })

    editor.on('change', handlerChange)
  }

  return editor;
}

let editorMarkdown = EditorMarkdown();

function handlerChange (e) {
    const content = document.getElementById('editor-markdown');
    if(content) {
        content.value  = editorMarkdown.getMarkdown()
    }
}

document.addEventListener('alpine:init', () => {
  Alpine.store('editor', {
    setMarkdown: (markdown) => {
      console.log(markdown)
      editorMarkdown?.setMarkdown(markdown);
    },
    getMarkdown: () => {
      return editorMarkdown?.getMarkdown();
    },
    getHTML: () => {
      return editorMarkdown?.getHTML();
    }
  });
});

window.htmx?.on('htmx:afterRequest', (evt) => {
    editorMarkdown = EditorMarkdown();
})
