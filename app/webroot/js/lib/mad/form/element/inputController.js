steal(
	MAD_ROOT + '/form/formElement.js',
	MAD_ROOT + '/view/form/element/inputView.js',
	MAD_ROOT + '/view/template/component/input.ejs'
).then(function ($) {

	/*
	 * @class mad.form.element.InputController
	 * @inherits mad.form.FormElement
	 * @parent mad.form
	 * 
	 * The Input Form Element Controller is our implementation of the UI component input
	 * 
	 * @constructor
	 * Creates a new Input Form Element Controller
	 * 
	 * @param {HTMLElement} element the element this instance operates on.
	 * @param {Object} [options] option values for the controller.  These get added to
	 * this.options and merged with defaults static variable
	 * @return {mad.form.element.InputController}
	 */
	mad.form.FormElement.extend('mad.form.element.InputController', /** @static */ {

		'defaults': {
			'label': 'Input Form Element Controller',
			'templateUri': '//' + MAD_ROOT + '/view/template/component/input.ejs',
			'viewClass': mad.view.form.element.InputView
		}

	}, /** @prototype */ { });

});