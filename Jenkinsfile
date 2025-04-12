pipeline {
    agent any

    stages {
        stage('Clone Repo') {
            steps {
                git branch: 'main', url: 'https://github.com/Sangita1235/Recipie_Finder.git'
            }
        }

        stage('Docker Build & Run') {
            steps {
                echo 'docker-compose up -d --build'
            }
        }

        stage('Deploy or Test') {
            steps {
                echo 'run app on http://localhost:8080'
            }
        }
    }

    post {
        always {
            echo 'run: docker-compose down'
        }
    }
}
