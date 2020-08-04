function isExternal(linkElement) {
	return ((linkElement.host !== window.location.host) || linkElement.attributes.href.nodeValue[0] === '#');
}

export default isExternal;