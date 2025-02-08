import React, { useState, useRef } from 'react';
import {
  View,
  Text,
  TextInput,
  TouchableOpacity,
  ScrollView,
  KeyboardAvoidingView,
  Platform,
  StyleSheet,
  SafeAreaView,
} from 'react-native';
import { GoogleGenerativeAI } from "@google/generative-ai";


const genAI = new GoogleGenerativeAI('AIzaSyCeCxcCIyhTxUyxXwSCFCuhAWRzSOq9OYk'); // Replace with your actual API key
const model = genAI.getGenerativeModel({ model: "gemini-pro" });

const ChatbotUI = () => {
  const [messages, setMessages] = useState([
    { id: 1, text: "Hello! I'm your AI Travel Assistant. I can help you plan your perfect trip, find the best destinations, and answer any travel-related questions. How can I assist you today? 🌎✈️", isBot: true },
  ]);
  const [inputText, setInputText] = useState('');
  const [activeButton, setActiveButton] = useState('Hotels');
  const [isLoading, setIsLoading] = useState(false);
  const scrollViewRef = useRef();

  const navigationButtons = [
    { id: '1', title: 'Hotels', icon: '🏨' },
    { id: '5', title: 'Flights', icon: '✈️' },
    { id: '3', title: 'Itinerary', icon: '🗺️' },
    { id: '4', title: 'Budget', icon: '💰' },
    { id: '2', title: 'Beaches', icon: '🏖️' },
    { id: '6', title: 'Wildlife', icon: '🐘' },
  ];

  // const handleButtonPress = (title) => {
  //   setActiveButton(title);
  //   const botResponse = {
  //     id: messages.length + 1,
  //     text: `Let me help you with ${title.toLowerCase()}. What specific information do you need?`,
  //     isBot: true,
  //   };
  //   setMessages([...messages, botResponse]);
  // };

  const getGeminiResponse = async (prompt) => {


    try {
      //test promt start
      const enhancedPrompt = `You are a Sri Lankan tourism expert assistant. Your role is to provide detailed, accurate information about Sri Lanka's tourism industry, including cultural sites, beaches, wildlife, accommodations, transportation, and local experiences. Please provide helpful recommendations based on Sri Lankan tourism context.

      Context: Sri Lanka is known for its ancient Buddhist ruins, beautiful beaches, tea plantations, diverse wildlife, and rich cultural heritage. The country offers various tourism experiences including:
      - Cultural Triangle (Anuradhapura, Polonnaruwa, Sigiriya)
      - Beach destinations (Mirissa, Unawatuna, Arugam Bay)
      - Hill Country (Nuwara Eliya, Ella, Kandy)
      - Wildlife safaris (Yala, Udawalawe, Wilpattu)
      - Ayurvedic wellness experiences
      - Tea plantation tours
      - Traditional cuisine and cooking classes
      - Local festivals and events
      
      User Query: ${prompt}
      
      Please provide specific, practical advice related to Sri Lankan tourism, including relevant local details, cultural considerations, and travel tips.`;
      //test prompt end
      const result = await model.generateContent(prompt);
      const response = await result.response;
      return response.text();
    } catch (error) {
      console.error('Error getting Gemini response:', error);
      return "I apologize, but I'm having trouble processing your request at the moment. Please try again later.";
    }
  };

  const sendMessage = async () => {
    if (inputText.trim() === '') return;

    const newUserMessage = {
      id: messages.length + 1,
      text: inputText,
      isBot: false,
    };

   
    setMessages(prevMessages => [...prevMessages, newUserMessage]);
    setInputText('');
    setIsLoading(true);

    try {
      // Get response from Gemini
      const geminiResponse = await getGeminiResponse(inputText);
      
      const botResponse = {
        id: messages.length + 2,
        text: geminiResponse,
        isBot: true,
      };

      // Add bot response
      setMessages(prevMessages => [...prevMessages, botResponse]);
    } catch (error) {
      console.error('Error in sendMessage:', error);
      const errorResponse = {
        id: messages.length + 2,
        text: "I apologize, but I'm having trouble processing your request at the moment. Please try again later.",
        isBot: true,
      };
      setMessages(prevMessages => [...prevMessages, errorResponse]);
    } finally {
      setIsLoading(false);
    }
  };

  const MessageBubble = ({ text, isBot }) => (
    <View style={[styles.messageBubble, isBot ? styles.botBubble : styles.userBubble]}>
      <Text style={[styles.messageText, isBot ? styles.botText : styles.userText]}>
        {text}
      </Text>
    </View>
  );

  return (
    <SafeAreaView style={styles.container}>
      {/* Header */}
      <View style={styles.header}>
        <View style={styles.botStatus}>
          <View style={styles.botAvatarHeader}>
            <Text style={styles.botAvatarText}>✈️</Text>
          </View>
          <View>
            <Text style={styles.botName}>Travel AI Assistant</Text>
            <Text style={styles.botSubtitle}>Ready to plan your next adventure</Text>
          </View>
        </View>
      </View>

      {/* Navigation Buttons */}
      {/* <View style={styles.navigationButtons}>
        {navigationButtons.map((button) => (
          <TouchableOpacity
            key={button.id}
            style={[
              styles.navButton,
              activeButton === button.title && styles.activeNavButton
            ]}
            onPress={() => handleButtonPress(button.title)}
          >
            <Text style={styles.navButtonIcon}>{button.icon}</Text>
            <Text style={[
              styles.navButtonText,
              activeButton === button.title && styles.activeNavButtonText
            ]}>
              {button.title}
            </Text>
          </TouchableOpacity>
        ))}
      </View> */}

      {/* Messages */}
      <ScrollView
        style={styles.messagesContainer}
        ref={scrollViewRef}
        onContentSizeChange={() => scrollViewRef.current.scrollToEnd({ animated: true })}
      >
        {messages.map((message) => (
          <View
            key={message.id}
            style={[
              styles.messageRow,
              message.isBot ? styles.botMessageRow : styles.userMessageRow
            ]}
          >
            {message.isBot && (
              <View style={styles.botAvatar}>
                <Text style={styles.botAvatarText}>✈️</Text>
              </View>
            )}
            <MessageBubble text={message.text} isBot={message.isBot} />
          </View>
        ))}
        {isLoading && (
          <View style={styles.loadingContainer}>
            <Text style={styles.loadingText}>Typing...</Text>
          </View>
        )}
      </ScrollView>

      {/* Input Area */}
      <KeyboardAvoidingView
        behavior={Platform.OS === 'ios' ? 'padding' : 'height'}
        style={styles.inputContainer}
      >
        <TextInput
          style={styles.input}
          value={inputText}
          onChangeText={setInputText}
          placeholder="Ask about your next trip..."
          placeholderTextColor="#666"
          multiline
          editable={!isLoading}
          onSubmitEditing={sendMessage}
        />
        <TouchableOpacity
          style={[
            styles.sendButton, 
            (!inputText.trim() || isLoading) && styles.sendButtonDisabled
          ]}
          onPress={sendMessage}
          disabled={!inputText.trim() || isLoading}
        >
          <Text style={styles.sendButtonText}>✈️</Text>
        </TouchableOpacity>
      </KeyboardAvoidingView>
    </SafeAreaView>
  );
};

const styles = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#f8f9fa',
    padding :10
  },
  header: {
    padding: 20,
    backgroundColor: '#2ecc71',
    borderBottomWidth: 1,
    borderBottomColor: '#27ae60',
  },
  botStatus: {
    flexDirection: 'row',
    alignItems: 'center',
  },
  botAvatarHeader: {
    width: 40,
    height: 50,
    backgroundColor: '#fff',
    borderRadius: 20,
    justifyContent: 'center',
    alignItems: 'center',
    marginRight: 12,
  },
  botName: {
    fontSize: 18,
    fontWeight: '600',
    color: '#fff',
  },
  botSubtitle: {
    fontSize: 12,
    color: '#fff',
    opacity: 0.9,
  },
  navigationButtons: {
    flexDirection: 'row',
    justifyContent: 'space-around',
    padding: 10,
    backgroundColor: '#fff',
    borderBottomWidth: 1,
    borderBottomColor: '#e0e0e0',

  },
  navButton: {
    alignItems: 'center',
    padding: 10,
    borderRadius: 8,
    backgroundColor: '#f5f5f5',
    minWidth: 80,
  },
  activeNavButton: {
    backgroundColor: '#2ecc71',
  },
  navButtonIcon: {
    fontSize: 20,
    marginBottom: 4,
  },
  navButtonText: {
    fontSize: 12,
    color: '#666',
    fontWeight: '500',
  },
  activeNavButtonText: {
    color: '#fff',
  },
  messagesContainer: {
    flex: 1,
    padding: 15,
  },
  messageRow: {
    flexDirection: 'row',
    marginBottom: 15,
    alignItems: 'flex-end',
  },
  botMessageRow: {
    justifyContent: 'flex-start',
  },
  userMessageRow: {
    justifyContent: 'flex-end',
  },
  botAvatar: {
    width: 35,
    height: 35,
    borderRadius: 17.5,
    backgroundColor: '#2ecc71',
    justifyContent: 'center',
    alignItems: 'center',
    marginRight: 8,
  },
  botAvatarText: {
    fontSize: 16,
  },
  messageBubble: {
    maxWidth: '70%',
    padding: 12,
    borderRadius: 20,
  },
  botBubble: {
    backgroundColor: '#fff',
    borderWidth: 1,
    borderColor: '#e0e0e0',
    borderBottomLeftRadius: 5,
  },
  userBubble: {
    backgroundColor: '#2ecc71',
    borderBottomRightRadius: 5,
  },
  messageText: {
    fontSize: 16,
    lineHeight: 20,
  },
  botText: {
    color: '#333',
  },
  userText: {
    color: '#fff',
  },
  inputContainer: {
    flexDirection: 'row',
    padding: 10,
    backgroundColor: '#fff',
    borderTopWidth: 1,
    borderTopColor: '#e0e0e0',
  },
  input: {
    flex: 1,
    backgroundColor: '#f5f5f5',
    borderRadius: 20,
    paddingHorizontal: 15,
    paddingVertical: 10,
    marginRight: 10,
    fontSize: 16,
    maxHeight: 100,
  },
  sendButton: {
    backgroundColor: '#2ecc71',
    borderRadius: 25,
    width: 50,
    height: 50,
    justifyContent: 'center',
    alignItems: 'center',
  },
  sendButtonDisabled: {
    backgroundColor: '#ccc',
  },
  sendButtonText: {
    fontSize: 20,
  },
});

export default ChatbotUI;