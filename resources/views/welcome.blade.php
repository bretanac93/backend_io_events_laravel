<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
    </head>
    <body>
        <div id="app">
            <h1>Latest users</h1>
            <ul>
                <li v-for="item in users">@{{ item.name }} - <small v-if="item.online">online</small><small v-if="!item.online">offline</small></li>
            </ul>
        </div>
        <script src="http://cdn.lo/js/socket.io.js" type="text/javascript"></script>
        <script src="http://cdn.lo/js/vue.js" type="text/javascript"></script>
        <script src="http://cdn.lo/js/jquery.js" type="text/javascript"></script>
        <script src="http://cdn.lo/js/vue-resource.js"></script>
        <script src="http://cdn.lo/js/underscore.js" type="text/javascript"></script>
        <script type="text/javascript">
            var socket = io('http://localhost:3000');
            new Vue({
                el: "#app",

                data: {
                    users: []
                },
                methods: {
                    getUsersList: function () {
                        jQuery.getJSON('api/users', function (users) {
                            // console.log()
                            this.users = users;
                        }.bind(this));
                    }
                },
                created: function () {
                    this.getUsersList();
                    socket.on('test-channel:UserSignedUp', function (data) {
                        data['online'] = true;
                        this.users.push(data);
                    }.bind(this));

                    socket.on('test-channel:UserLogged', function (data) {
                        var id = data.id;
                        for (var i = 0; i < this.users.length; i++) {
                            if (this.users[i].id == id) {
                                this.users[i].online = true;
                            }
                        }
                    }.bind(this));

                    socket.on('test-channel:UserLoggedOut', function (data) {
                        var id = data.id;
                        for (var i = 0; i < this.users.length; i++) {
                            if (this.users[i].id == id)
                                this.users[i].online = false;
                        }
                    }.bind(this));
                }
            });
        </script>
    </body>
</html>
