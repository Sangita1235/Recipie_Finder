pipeline {
    agent any

    stages {
        stage('Clone Repo') {
            steps {
                git 'https://github.com/Sangita1235/Recipie_Finder.git'
            }
        }

        stage('Docker Build & Run') {
            steps {
                echo 'Skipping actual docker-compose build. Would run: docker-compose up -d --build'
            }
        }

        stage('Deploy or Test') {
            steps {
                echo 'Skipping actual deployment. Would run app on http://localhost:8080'
            }
        }
    }

    post {
        always {
            echo 'Skipping docker-compose down. Would run: docker-compose down'
        }
    }
}
