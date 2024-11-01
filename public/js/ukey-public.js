const postEntry = document.querySelector('.entry-content');
if (postEntry) {
	const postEntryInnerEles = postEntry.querySelectorAll('p:nth-child(n+3)');
	if (postEntryInnerEles) {
		for (var i = 0; i < postEntryInnerEles.length; i++) {
			postEntryInnerEles[i].classList.add('uk-hidden');
		}
	}
}

function ukeyEventHandler(event) {    
	  const postEntry = document.querySelector('.entry-content');
	  const postEntryInnerEles = postEntry.querySelectorAll('p:nth-child(n+3)');
	
      if (event.status === 'Paid') {
		for (var i = 0; i < postEntryInnerEles.length; i++) {
			postEntryInnerEles[i].classList.remove('uk-hidden');
		}

      } else if (event.status === 'Init') {
		for (var i = 0; i < postEntryInnerEles.length; i++) {
			postEntryInnerEles[i].classList.add('uk-hidden');
		}
      }
}
