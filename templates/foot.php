
  </div>
  <!-- Optional JavaScript -->
  <!-- jQuery first, then Popper.js, then Bootstrap JS -->
  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4"
    crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1"
    crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/vue"></script>
  <script>
  var app = new Vue({
    el: '#app',
    data() {
        return {
            routes: [
                {
                    key: "行動服務",
                    paths: [
                        {
                            key: "Profile",
                            path: "/GAE/profile.php",
                            date: ""
                        },
                        {
                            key: "Form",
                            path: "/GAE/form.php",
                            date: ""
                        },
                        {
                            key: "Cloud Datastore",
                            path: "/GAE/contacts.php",
                            date: "2017-10-16"
                        }
                    ]
                },
                {
                    key: "雲端服務技術",
                    paths: [
                        {
                            key: "Google SignIn",
                            path: "/JJ/signin.php",
                            date: "2017-10-06"
                        }
                        ]
                },
                {
                    key: "PHP程式設計",
                    paths: []
                }
            ]
        }
    }
});
</script>
</body>

</html>