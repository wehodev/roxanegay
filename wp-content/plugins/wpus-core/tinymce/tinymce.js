(function() {
	tinymce.PluginManager.add('adamas_shortcodes', function( ed, url ) {
		ed.addButton( 'adamas_shortcodes', {
			title: 'Shortcodes',
			image: false,
			icon: 'wpus-sc-icon',
			type: 'menubutton',
			menu: [

				{
					text: 'Empy Space',
					onclick: function() {
						ed.windowManager.open( {
							title: 'Empty Space Shortcode',
							body: [
								{
									type: 'textbox',
									name: 'height',
									label: 'Height(px)',
									value: '30px',
								},
							],
							onsubmit: function( e ) {
								ed.insertContent( '[wpus_empty_space height="' + e.data.height + '"]');
							}
						});
					}
				},

				{
					text: 'Highlights',
					onclick: function() {
						ed.windowManager.open( {
							title: 'Highlights Shortcode',
							body: [
								{
									type: 'textbox',
									name: 'text',
									label: 'Text',
									value: ed.selection.getContent(),
								},
								{
									type: 'textbox',
									name: 'color',
									label: 'Text Color',
									value: '#ffffff',
								},
								{
									type: 'textbox',
									name: 'background_color',
									label: 'Background Color',
									value: '#81c689',
								}
							],
							onsubmit: function( e ) {
								ed.insertContent( '[wpus_highlight background_color="' + e.data.background_color + '" color="' + e.data.color + '"]'+ e.data.text +'[/adamas_highlight]');
							}
						});
					}
				},

			]
		});
	});
})();