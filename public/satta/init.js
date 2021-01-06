(function($) {
  $(function() {
    var window_width = $(window).width();

    // Plugin initialization
    $('.carousel').carousel();
    $('.carousel.carousel-slider').carousel({
      fullWidth: true,
      indicators: true,
      onCycleTo: function(item, dragged) {}
    });
    $('.collapsible').collapsible();
    $('.collapsible.expandable').collapsible({
      accordion: false
    });

    $('.dropdown-trigger').dropdown({
      hover: false,
      constrainWidth: false,
      coverTrigger: false,
      closeOnClick: true,
      alignment: 'left'
    });
    $('.slider').slider();
    $('.parallax').parallax();
    $('.materialboxed').materialbox();
    $('.modal').modal();
    $('.scrollspy').scrollSpy();
    $('.datepicker').datepicker();
    $('.tabs').tabs();
    $('.timepicker').timepicker();
    $('.tooltipped').tooltip();
    $('select')
      .not('.disabled')
      .formSelect();
    $('.sidenav').sidenav();
    $('.tap-target').tapTarget();
    $('input.autocomplete').autocomplete({
      data: { Apple: null, Microsoft: null, Google: 'http://placehold.it/250x250' }
    });
    $('input[data-length], textarea[data-length]').characterCounter();

    // Swipeable Tabs Demo Init
    if ($('#tabs-swipe-demo').length) {
      $('#tabs-swipe-demo').tabs({ swipeable: true });
    }

    // Chips
    $('.chips').chips();
    $('.chips-initial').chips({
      readOnly: true,
      data: [
        {
          tag: 'Apple'
        },
        {
          tag: 'Microsoft'
        },
        {
          tag: 'Google'
        }
      ]
    });
    $('.chips-placeholder').chips({
      placeholder: 'Enter a tag',
      secondaryPlaceholder: '+Tag'
    });
    $('.chips-autocomplete').chips({
      autocompleteOptions: {
        data: {
          Apple: null,
          Microsoft: null,
          Google: null
        }
      }
    });

    // Fab
    $('.fixed-action-btn').floatingActionButton();
    $('.fixed-action-btn.horizontal').floatingActionButton({
      direction: 'left'
    });
    $('.fixed-action-btn.click-to-toggle').floatingActionButton({
      direction: 'left',
      hoverEnabled: false
    });
    $('.fixed-action-btn.toolbar').floatingActionButton({
      toolbarEnabled: true
    });
  }); // end of document ready
})(jQuery); // end of jQuery name space
