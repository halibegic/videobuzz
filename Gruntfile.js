module.exports = function(grunt) {

    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),

        concat: {
            dist: {
                src:  [
                    'bower_components/jquery/dist/jquery.min.js',
                    'bower_components/bootstrap/js/collapse.js',
                    'bower_components/bootstrap/js/dropdown.js',
                    'bower_components/bootstrap/js/transition.js',
                    'bower_components/owl.carousel/src/js/owl.carousel.js',
                    'bower_components/owl.carousel/src/js/owl.navigation.js',
                    'bower_components/smoothstate/jquery.smoothState.min.js',
                    'src/js/main.js',
                ],
                dest: 'dist/js/main.js'
            }
        },

        uglify: {
            dist: {
                files: {
                    'dist/js/main.min.js': ['<%= concat.dist.dest %>']
                }
            }
        },

        sass: {
            dev: {
                files: {
                    'dist/css/main.css': 'src/sass/main.scss'
                }
            },
            dist: {
                options: {
                    style: 'compressed'
                },
                files: {
                    'dist/css/main.min.css': 'dist/css/main.css'
                }
            }
        },

        watch: {
            files: ['src/sass/**/*.scss'],
            tasks: ['concat', 'uglify', 'sass']
        }
    });

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.registerTask('default', ['concat', 'uglify', 'sass', 'watch']);
};
