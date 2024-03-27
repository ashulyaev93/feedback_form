<template>
  <div>
    <form @submit.prevent="submitForm">
      <div>
        <label for="name">Имя:</label>
        <input type="text" id="name" v-model="formData.name" required>
      </div>
      <div>
        <label for="phone">Телефон:</label>
        <input type="tel" id="phone" v-model="formData.phone" required>
      </div>
      <div>
        <label for="message">Сообщение:</label>
        <textarea id="message" v-model="formData.message" required></textarea>
      </div>
      <button type="submit">Отправить</button>
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
      }
    };
  },
  methods: {
    submitForm() {
      axios.post('/feedback', this.formData)
        .then(response => {
          console.log('Успешно отправлено:', response.data);
        })
        .catch(error => {
          console.error('Ошибка при отправке:', error);
        });
    }
  }
};
</script>

<style lang="less" scoped>
.main {
  width: 992px;
  margin: 0 auto;
  padding: 40px;
}
</style>