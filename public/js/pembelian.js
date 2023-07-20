Vue.component("image-partial", {
    template: "#image-add",
    data() {
        return {
          imageFile: vue.files,
        }
    },
    methods: {   
      setImage() {
        console.log(this.imageFile);
      }
      
    }
  });
  
  Vue.component("url-partial", {
    template: "#url-add"
  });
  
  var vue = new Vue({
    el: "#addProduct",
    data: {
      stock: false,
      image: 0,
      url: 1,
      limit: 3,
      files: [],
      categories: [
        {
          id: 1,
          name: "Private",
        },
        {
          id: 2,
          name: "Umum",
        }
      ],
      
      currencies: [
        {
          id: 1,
          name: "(Rp.) IDR",
        },
        
        {
          id: 2,
          name: "($.) USD",
        },
        
        {
          id: 3,
          name: "($.) HKD",
        }
      ],
      
      unit: [
        {
          id: 1,
          name: "kg.",
        },
        
        {
          id: 2,
          name: "gr.",
        },
        
        {
          id: 2,
          name: "mg.",
        }
      ],
    
    },
  
    methods: {
      enableStock: function() {
        this.stock = true;
      },
  
      disableStock: function() {
        this.stock = false;
      },
  
      addPicture: function() {
        var id = this.image += 1;
        this.files.push({id: id, url: ''});
        console.log(this.files.length);
      },
  
      addVideoUrl: function() {
        this.url += 1;
      },
    }
  });