import axios from 'axios';

const GEMINI_API_KEY = 'AIzaSyCeCxcCIyhTxUyxXwSCFCuhAWRzSOq9OYk'; // Replace with your actual key

const getGeminiResponse = async (message) => {
  try {
    const response = await axios.post(
      'https://api.gemini.google.com/v1/text', // Replace with the actual endpoint
      {
        prompt: message,
        // Other parameters like temperature, max_tokens, etc.
      },
      {
        headers: {
          'Authorization': `Bearer ${GEMINI_API_KEY}`,
        },
      }
    );

    return response.data.text; 
  } catch (error) {
    console.error('Error fetching response from Gemini AI:', error);
    return 'An error occurred. Please try again later.'; 
  }
};

export default getGeminiResponse;