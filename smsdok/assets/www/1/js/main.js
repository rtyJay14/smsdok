 var app = {  
      showAlert: function (message, title) {  
    if (navigator.notification) {  
     navigator.notification.alert(message, null, title, 'OK');  
    } else {  
     alert(title ? (title + ": " + message) : message);  
    }  
      },  
renderHomeView: function() {  
      var today = new Date();  
      var dateTxt = today.getDate() +   
      "." + (today.getMonth()+1) +  
      "." + today.getFullYear();        
      var data = {  
      name: "I am the One",   
      date: dateTxt,  
      comment: [  
           { description: "walking with you."  
           },   
           { description: "eating together."  
           },  
           { description: "driving around town."  
           },  
      ] };  
   $('body').html(this.homeTemplate(data));       
   },  
   initialize: function() {  
        var self = this;  
        var source = $("#a-comment").html();  
     self.showAlert('This is how its done','Info');  
     this.homeTemplate = Handlebars.compile(source);  
     this.renderHomeView();  
   }  
 app.initialize(); 