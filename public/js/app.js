
window.App = {
    Models: {},
    Collections: {},
    Views: {},
    Router: {},
    Template: function (id) { return _.template( $('#' + id).html() ); },
  };

$(function(){

$.ajaxPrefilter(function(options, originalOptions, jqXHR) {
  var token;
  if (!options.crossDomain) {
    token = $('meta[name="token"]').attr('content');
    if (token) {
      return jqXHR.setRequestHeader('X-CSRF-Token', token);
    }
  }
});


    /**
     *  ** Models **
     *
     */
     App.Models.allRooms = Backbone.Model.extend({

        validate: function(attrs, option) {

          }
     });

    /**
     *  ** Collections **
     *
     */
     App.Rooms = Backbone.Collection.extend({
      model: App.Models.allRooms,

      url : function() {
        return '/api/v1/rooms/searchAvailability';
      }

     });

    /**
     *  ** Views **
     *
     */
    App.Views.App = Backbone.View.extend({
      
      initialize: function() {
        console.log('app');
        var rooms = new App.Rooms;
        var roomSearch = new App.Views.SearchRooms({ collection: rooms });
      }
    });    

    /*
        SearchRooms
     */
    App.Views.SearchRooms = Backbone.View.extend({
      el: "#initSearch",

      initialize: function() {
        _.bindAll(this, "initSearch");
        this.city = $('input[name="city"]');
        this.nights = $('select[name="nights"] option:selected');
        this.guests = $('select[name="guests"] option:selected');
        this.price = $('input[name="price"]');

        $("input[name='price']").on("slidechange", this.initSearch);
        $("input[name='type']").on("change", this.initSearch);
        $("input[name='rating']").on("change", this.initSearch);

      },

      events: {
        'submit': 'initSearch'
      },

      initSearch: function(e) {
        e.preventDefault();
        var that = this;
        var type = [];
        var rating = [];

        $.each($("input[name='type']:checked"), function(){            
                type.push($(this).val());
        });
        $.each($("input[name='rating']:checked"), function(){            
                rating.push($(this).val());
        });

        this.collection.fetch({
            data: {
                city: that.city.val(),
                nights: that.nights.val(),
                guests: that.guests.val(),
                price: that.price.val(),
                type: type,
                rating: rating,
            },
            success: function(collection){ that.render(collection) ; }
        });

      },

      render: function(collection) {
            $('#main_content').empty();
            this.collection.each(function(room){
                var roomView = new App.Views.SingleRoomRow({ model: room });
                $('#main_content').append(roomView.render().el);
            });
      }

    });

    App.Views.SingleRoomRow = Backbone.View.extend({

        template: App.Template('productRowTemplate'),

        render: function(){
            this.$el.html( this.template(this.model.toJSON()));
            return this;  // returning this from render method..
        }
    });

   /*
        Init App
     */
    new App.Views.App(); 

});