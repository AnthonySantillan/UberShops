
import React, { useContext, useEffect } from 'react';
import { View, Text, TouchableOpacity } from 'react-native';
import {
  AuthBackground,
  AuthButton,
  AuthCover,
  AuthInput,
} from '../components/Auth/auth.styles';
import { AuthContext } from '../context/Auth/auth.context';
import { Title, DefaultText, SpacerBottom } from '../constants';
import { TextInput } from 'react-native-paper';



export const LoginScreen = ({ navigation }) => {
  const { isAuth, onLogin } = useContext(AuthContext);

  return (
    <AuthBackground>
      <AuthCover>
        <Title> Login </Title>
        <SpacerBottom />
        <AuthInput label="User Name" />
        <AuthInput label="Password" secureTextEntry />
        <SpacerBottom />
        <AuthButton onPress={() => onLogin()}> Login</AuthButton>
        <SpacerBottom />
        <DefaultText>
          No tiene cuenta ?{' '}
          <TouchableOpacity onPress={() => navigation.navigate('Register')}>
            <Text> Registrarse </Text>
          </TouchableOpacity>{' '}
        </DefaultText>
      </AuthCover>
    </AuthBackground>
  );
};
