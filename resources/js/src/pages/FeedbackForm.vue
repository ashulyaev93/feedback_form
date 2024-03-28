<template>
  <div>
    <form @submit.prevent="submitForm" class="form">
      <div class="form-group">
        <label for="name">Имя:</label>
        <input type="text" id="name" v-model="formData.name" required>
      </div>
      <div class="form-group">
        <label for="phone">Телефон:</label>
        <input type="tel" id="phone" v-model="formData.phone" required placeholder="9271234567">
        <p v-if="phoneError" class="error-message">{{ phoneError }}</p>
      </div>
      <div class="form-group">
        <label for="message">Сообщение:</label>
        <textarea id="message" v-model="formData.message" required></textarea>
      </div>
      <button type="submit" class="submit-button">Отправить</button>
    </form>
  </div>
</template>

<script>
import axios from 'axios';

export default {
  data() {
    return {
      formData: {
        name: '',
        phone: '',
        message: ''
      },
      phoneError: '' 
    };
  },
  methods: {
    submitForm() {
      axios.post('/feedback', this.formData)
        .then(response => {
          console.log('Успешно отправлено:', response.data);
          this.formData.name = '';
          this.formData.phone = '';
          this.formData.message = '';
          this.phoneError = ''; 
        })
        .catch(error => {
          console.error('Ошибка при отправке:', error);
          if (error.response && error.response.data && error.response.data.phoneError) {
            this.phoneError = error.response.data.phoneError;
          } else {
            this.phoneError = 'Произошла ошибка при отправке формы.';
          }
        });
    }
  }
};
</script>

<style lang="less" scoped>
.form {
  width: 400px;
  margin: 0 auto;
  padding: 20px;
}

.form-group {
  margin-bottom: 20px;
}

.form-group label {
  display: block;
  font-weight: bold;
}

.error-message {
  color: red;
  font-size: 14px;
}

.submit-button {
  background-color: orange;
  color: white;
  border: none;
  padding: 10px 20px;
  cursor: pointer;
  border-radius: 5px;
}

.submit-button:hover {
  background-color: darkorange;
}
</style>
