(function (api, $) {
	'use strict';

	/**
	 * Slider control.
	 *
	 * @class
	 * @augments wp.customize.Control
	 * @augments wp.customize.Class
	 */
	api.SliderControl = api.Control.extend({
		initialize(id, options) {
			const control = this;
			let args;

			args = options || {};

			if (!args.params.fileType) {
				args.params.fileType = 'image';
			}

			if (!args.params.type) {
				args.params.type = 'slider';
			}
			if (!args.params.content) {
				args.params.content = $('<li></li>');
				args.params.content.attr('id', 'customize-control-' + id.replace(/]/g, '').replace(/\[/g, '-'));
				args.params.content.attr('class', 'customize-control customize-control-' + args.params.type);
			}

			if (!args.params.attachments) {
				args.params.attachments = [];
			}

			api.Control.prototype.initialize.call(control, id, args);
		},

		/**
		 * When the control's DOM structure is ready,
		 * set up internal event bindings.
		 */
		ready() {
			const control = this;
			// Shortcut so that we don't have to use _.bind every time we add a callback.
			_.bindAll(control, 'openFrame', 'select');

			/**
			 * Set gallery data and render content.
			 */
			function setGalleryDataAndRenderContent() {
				const value = control.setting.get();
				control.setAttachmentsData(value).done(() => {
					control.renderContent();
					control.setupSortable();
				});
			}

			// Ensure attachment data is initially set.
			setGalleryDataAndRenderContent();

			// Update the attachment data and re-render the control when the setting changes.
			control.setting.bind(setGalleryDataAndRenderContent);

			// Bind events.
			control.container.on('click keydown', '#manila-modify-slider', control.openFrame);
			control.container.on('click keydown', '#manila-reset-slider', () => {
				control.resetSlider(control);
			});
		},

		/**
		 * Fetch attachment data for rendering in control content.
		 *
		 * @param {Array} value Setting value, array of attachment ids.
		 * @returns {*}
		 */
		setAttachmentsData(value) {
			const control = this;
			const promises = [];

			control.params.attachments = [];

			_.each(value, (id, index) => {
				const hasAttachmentData = new $.Deferred();
				wp.media.attachment(id).fetch().done(function () {
					control.params.attachments[index] = this.attributes;
					hasAttachmentData.resolve();
				});
				promises.push(hasAttachmentData);
			});

			return $.when.apply(undefined, promises).promise();
		},

		/**
		 * Open the media modal.
		 */
		openFrame(event) {
			event.preventDefault();

			if (!this.frame) {
				this.initFrame();
			}

			this.frame.open();
		},

		/**
		 * Initiate the media modal select frame.
		 * Save it for using later in case needed.
		 */
		initFrame() {
			const control = this;
			let preSelectImages;

			this.frame = wp.media({

				button: {
					text: control.params.button_labels.frame_button
				},
				states: [
					new wp.media.controller.Library({
						title: control.params.button_labels.frame_title,
						library: wp.media.query({type: control.params.fileType}),
						multiple: 'add'
					})
				]
			});

			/**
			 * Pre-select images according to saved settings.
			 */
			preSelectImages = function () {
				let selection;
				let ids;
				let attachment;
				let library;

				library = control.frame.state().get('library');
				selection = control.frame.state().get('selection');

				ids = control.setting.get();

				// Sort the selected images to top when opening media modal.
				library.comparator = function (a, b) {
					const hasA = this.mirroring.get(a.cid) === true;
					const hasB = this.mirroring.get(b.cid) === true;

					if (!hasA && hasB) {
						return -1;
					} if (hasA && !hasB) {
						return 1;
					}
					return 0;
				};

				_.each(ids, id => {
					attachment = wp.media.attachment(id);
					selection.add(attachment ? [attachment] : []);
					library.add(attachment ? [attachment] : []);
				});
			};
			control.frame.on('open', preSelectImages);
			control.frame.on('select', control.select);
		},

		/**
		 * Callback for selecting attachments.
		 */
		select() {
			const control = this;
			let attachments;
			let attachmentIds;

			attachments = control.frame.state().get('selection').toJSON();
			control.params.attachments = attachments;

			attachmentIds = control.getAttachmentIds(attachments);
			control.setSettingValues(attachmentIds);
		},

		/**
		 * Get array of attachment id-s from attachment objects.
		 *
		 * @param {Array} attachments Attachments.
		 * @returns {Array}
		 */
		getAttachmentIds(attachments) {
			const ids = [];
			let i;

			for (i in attachments) {
				ids.push(attachments[i].id);
			}

			return ids;
		},

		/**
		 * Set setting values.
		 *
		 * @param {Array} values Array of ids.
		 */
		setSettingValues(values) {
			const control = this;
			control.setting.set(values);
		},

		/**
		 * Setup sortable.
		 *
		 * @returns {void}
		 */
		setupSortable() {
			const control = this;
			const list = $('.manila-slider-attachments');

			list.sortable({
				items: '.manila-slider-thumbnail-wrapper',
				tolerance: 'pointer',
				stop() {
					const selectedValues = [];
					list.find('.manila-slider-thumbnail-wrapper').each(function () {
						let id;
						id = parseInt($(this).data('postId'), 10);
						selectedValues.push(id);
					});
					control.setSettingValues(selectedValues);
				}
			});
		},

		/**
		 * Reset slider.
		 */
		resetSlider(control) {
			control.setting.set([]);
		}

	});

	api.controlConstructor.slider = api.SliderControl;
})(wp.customize, jQuery);
