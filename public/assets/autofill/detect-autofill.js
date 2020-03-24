export default scope => {
	// match the filter on autofilled elements in Firefox
	const mozFilterMatch = /^grayscale\(.+\) brightness\((1)?.*\) contrast\(.+\) invert\(.+\) sepia\(.+\) saturate\(.+\)$/

	scope.addEventListener('animationstart', onAnimationStart)
	scope.addEventListener('input', onInput)
	scope.addEventListener('transitionstart', onTransitionStart)

	function onAnimationStart(event) {
		// detect autofills in Chrome and Safari by:
		//   - assigning animations to :-webkit-autofill, only available in Chrome and Safari
		//   - listening to animationstart for those specific animations
		if (event.animationName === 'onautofillstart') {
			// during autofill, the animation name is onautofillstart
			autofill(event.target)
		} else if (event.animationName === 'onautofillcancel') {
			// during autofill cancel, the animation name is onautofillcancel
			cancelAutofill(event.target)
		}
	}

	function onInput(event) {
		if ('data' in event) {
			// input events with data may cancel autofills
			cancelAutofill(event.target)
		} else {
			// input events without data are autofills
			autofill(event.target)
		}
	}

	function onTransitionStart(event) {
		// detect autofills in Firefox by:
		//   - listening to transitionstart, only available in Edge, Firefox, and Internet Explorer
		//   - checking filter style, which is only changed in Firefox
		const mozFilterTransition =
			event.propertyName === 'filter' &&
			getComputedStyle(event.target).filter.match(mozFilterMatch)

		if (mozFilterTransition) {
			if (mozFilterTransition[1]) {
				// during autofill, brightness is 1
				autofill(event.target)
			} else {
				// during autofill cancel, brightness is not 1
				cancelAutofill(event.target)
			}
		}
	}

	function autofill(target) {
		if (!target.isAutofilled) {
			target.isAutofilled = true
			target.setAttribute('autofilled', '')
			target.dispatchEvent(new CustomEvent('autofill', { bubbles: true }))
		}
	}

	function cancelAutofill(target) {
		if (target.isAutofilled) {
			target.isAutofilled = false
			target.removeAttribute('autofilled')
			target.dispatchEvent(new CustomEvent('autofillcancel', { bubbles: true }))
		}
	}

	return () => {
		scope.removeEventListener('animationstart', onAnimationStart)
		scope.removeEventListener('input', onInput)
		scope.removeEventListener('transitionstart', onTransitionStart)
	}
}
