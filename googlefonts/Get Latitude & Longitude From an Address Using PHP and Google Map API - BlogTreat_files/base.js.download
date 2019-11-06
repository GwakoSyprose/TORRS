/*
 * Plugin:      reCAPTCHA in WP comments form
 * Path:        /js
 * File:        base.js
 * Since:       9.1.0
 * Version:     9.1.0
 */

//
// Common javascript Tools
//
class griwpc_tools {
	*iteratingOver ( c ) { // c: an objects collection
		let ks = Object.getOwnPropertyNames( c );
		while (ks.length) {
			let k = ks.shift();
			yield [k, c[k]];
		}
	}

	// Old themes forced output mode
	GetElementById( n, id ) {
		var r = null;
		if ( n.getAttribute('id') == id ) return n;
		for ( var i = 0; i < n.childNodes.length; i++ ) {
			if ( n.childNodes[i].nodeType == 1 ) {
				r = this.GetElementById( n.childNodes[i], id );
				if ( r != null ) break;
			}
		}
		return r;
	}

	getForm () {

		let ele = undefined, previous;

		switch ( parseInt( griwpco.standardQueries) ) {
			case 0:
			case 2:
				ele = document.getElementById ( griwpco.formID )
				break;
			case 1:
			case 3:
				previous = document.querySelectorAll ( griwpco.formQuery );
				if ( previous.length )
					ele = previous[ griwpco.formQueryElem ];
				break;
		}

		return (( ele !== undefined ) ? ele : undefined);

	}

	getButton ( form ) {

		let ele = undefined, previous;

		switch ( parseInt( griwpco.standardQueries) ) {
			case 0:
			case 1:
				ele = this.GetElementById (form, griwpco.buttonID );
				break;
			case 2:
			case 3:
				previous = document.querySelectorAll ( griwpco.buttonQuery );
				if ( previous.length )
					ele = previous[ griwpco.buttonQueryElem ];
				break;
		}

		return (( ele !== undefined ) ? ele : undefined);

	}

}
const GriwpcTools = new griwpc_tools();

//
// javaScript pseudo jQuery.Ajax interface
//
class griwpc_ajax_interface {

	constructor() { 
    	this.versions = [ "MSXML2.XmlHttp.6.0", "MSXML2.XmlHttp.5.0", "MSXML2.XmlHttp.4.0", "MSXML2.XmlHttp.3.0", "MSXML2.XmlHttp.2.0", "Microsoft.XmlHttp" ];
	}

	init () {

	    if (typeof XMLHttpRequest !== 'undefined')
	        return new XMLHttpRequest();

	    let xhr;

	    for (var i = 0; i < this.versions.length; i++) {
	        try {
	            xhr = new ActiveXObject(versions[i]);
	            break;
	        } catch (e) {
	        }
	    }
	    return xhr;

	}

	send (url, callback, method, data, async = true) {
	    let x = this.init();

    	if ( async === undefined ) 
        	async = true;

	    x.open(method, url, async);
	    x.onreadystatechange = function () {
	        if ((x.readyState === 4) && (typeof callback === 'function')) {
	        	// we send the whole response so, inside this callback function, you're allow to perform all .error, .success, .always, .done, etc... routines
	            callback( x ) 
	        }
	    };

	    if ( ( method === 'POST' ) || ( method === 'post' ) ) {
	        x.setRequestHeader( 'Content-type', 'application/x-www-form-urlencoded' );
	    }
	    x.send( data )
	}

	get ( url, data, callback, async) {
	    let query = [];
	    for (var key in data) {
	        query.push(encodeURIComponent(key) + '=' + encodeURIComponent(data[key]));
	    }
	    this.send( url + (query.length ? '?' + query.join('&') : ''), callback, 'GET', null, async)
	}

	post (url, data, callback, async ) {
	    var query = [];
	    for ( var key in data ) {
	        query.push( encodeURIComponent(key) + '=' + encodeURIComponent( data[key] ) );
	    }
	    this.send( url, callback, 'POST', query.join('&'), async)
	}

}
const GriwpcAjax = new griwpc_ajax_interface();
