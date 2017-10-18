var app = new Vue({
    el: '#app',
    data() {
        return {
            routes: [
                {
                    key: "GAE",
                    paths: [
                        {
                            key: "Profile",
                            path: "./GAE/Profile",
                            date: ""
                        },
                        {
                            key: "Form",
                            path: "./GAE/Form",
                            date: ""
                        }
                    ]
                },
                {
                    key: "JJ",
                    paths: []
                },
                {
                    key: "PHP",
                    paths: []
                }
            ]
        }
    }
})